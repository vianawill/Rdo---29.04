<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Rdo;
use App\Models\Obra;
use App\Models\Equipamento;
use App\Models\MaoObra;
use App\Models\MaoObraDireta;
use App\Models\MaoObraIndireta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;


class RdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // antes estava assim
        // $rdos = Rdo::all();
        // $rdos = Rdo::with('obras')->get(); // Recupera todos os RDos com obras associadas
        // $rdos = Rdo::with('equipamentos')->get(); // Recupera todos os RDos com equipamentos associados
        // $rdos = Rdo::with('maoObras')->get(); // Recupera todos os RDos com mão de obras associadas
        $rdos = Rdo::with('obras', 'equipamentos', 'maoObraDiretas', 'maoObraIndiretas')->get(); // Recupera todos de uma vez
        return view('rdos.index', compact('rdos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rdos.create', [
            'obras' => \App\Models\Obra::all(),
            'turnos' => \App\Models\Turno::all(),
            'climas' => \App\Models\Clima::all(),
            'equipamentos' => \App\Models\Equipamento::all(),
            'maoObraDiretas' => \App\Models\MaoObraDireta::all(),
            'maoObraIndiretas' => \App\Models\MaoObraIndireta::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $rdo = \App\Models\Rdo::create([
                'numero_rdo' => 'RDO-' . now()->timestamp,
                'data' => $request->input('data'),
                'dia_da_semana' => now()->format('l'), // ou calcule com base na data
                'obra_id' => $request->input('obra_id'),
                'manha' => 'Bom',
                'tarde' => 'Bom',
                'noite' => 'Bom',
                'condicao_area' => 'Operável',
                'acidente' => 'Não houve',
            ]);

            foreach ($request->input('turnos') as $turno) {
                $rdoTurno = $rdo->turnos()->create([
                    'turno_id' => $turno['turno_id'],
                    'clima_id' => $turno['clima_id'],
                ]);

                foreach ($turno['equipamentos'] ?? [] as $equip) {
                    $rdoTurno->equipamentos()->create([
                        'equipamento_id' => $equip['equipamento_id'],
                        'quantidade' => $equip['quantidade']
                    ]);
                }

                foreach ($turno['mao_obra_diretas'] ?? [] as $direta) {
                    $rdoTurno->maoObraDiretas()->create([
                        'mao_obra_direta_id' => $direta['mao_obra_direta_id'],
                        'quant' => $direta['quantidade']
                    ]);
                }

                foreach ($turno['mao_obra_indiretas'] ?? [] as $indireta) {
                    $rdoTurno->maoObraIndiretas()->create([
                        'mao_obra_indireta_id' => $indireta['mao_obra_indireta_id'],
                        'quant' => $indireta['quantidade']
                    ]);
                }
            }
        });

        return redirect()->route('rdo.create')->with('success', 'RDO cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rdo  $rdo
     * @return \Illuminate\Http\Response
     */
    public function show(Rdo $rdo)
    {
        $rdos = Rdo::with('obras', 'equipamentos', 'maoObraDiretas', 'maoObraIndiretas')->get(); // Recupera todos de uma vez
        return view('rdos.create', compact('rdos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rdo  $rdo
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdo $rdo)
    {
        $rdos = Rdo::with('obras', 'equipamentos', 'maoObraDiretas', 'maoObraIndiretas')->get(); // Recupera todos de uma vez
        return view('rdos.create', compact('rdos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rdo  $rdo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rdo $rdo)
    {
        $rdo->update($request->all());
        return redirect()->route('rdos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rdo  $rdo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rdo $rdo)
    {
        $rdo->delete();
        return redirect()->route('rdos.index')->with('success', 'RDO excluído com sucesso.');
    }
    
    public function aprovar(Rdo $rdo)
    {
        $gerente = Auth::user(); // gerente logado

        // Verifica se o gerente já aprovou (evita duplicidade)
        if ($rdo->aprovado_por) {
            return response()->json([
                'message' => 'Este RDO já foi aprovado.'
            ], 400);
        }

        // Monta os dados para hash do conteúdo
        // por enquanto fica aqui, mas o ideal é ter tabelas separadas
        $conteudo = [
            'id' => $rdo->id,
            'numero_rdo' => $rdo->numero_rdo,
            'data' => $rdo->data,
            'dia_da_semana' => $rdo->dia_da_semana,
            'obra_id' => $rdo->obra_id,
            'manha' => $rdo->manha,
            'tarde' => $rdo->tarde,
            'noite' => $rdo->noite,
            'condicao_area' => $rdo->condicao_area,
            'acidente' => $rdo->acidente,
            'status' => $rdo->status,
            'created_at' => $rdo->created_at,
            'update_at' => $rdo->update_at,
        ];
        $hashConteudo = hash('sha256', json_encode($conteudo));

        // Monta os dados para hash de aprovação
        $dadosGerente = $gerente->id . '|' .
                        $gerente->cpf . '|' .
                        $gerente->name . '|' .
                        $gerente->email . '|' .
                        $rdo->id . '|' .
                        now()->toDateTimeString();
        // Gera o hash com SHA-256
        $hashAprovacao = hash('sha256', $dadosGerente);

        // Hash final
        $hashFinal = hash('sha256', $hashConteudo . '|' . $hashAprovacao);

        // Atualiza o RDO
        $rdo->aprovado_por = $gerente->id;
        $rdo->aprovado_em = now();
        $rdo->hash_conteudo = $hashConteudo;
        $rdo->hash_aprovacao = $hashAprovacao;
        $rdo->hash_final = $hashFinal;
        $rdo->status = 'Aprovado';
        $rdo->save();

        // return response()->json([ // abre uma janela com esses dados
        //     'message' => 'RDO aprovado com sucesso!',
        //     'hash_aprovacao' => $hash,
        //     'aprovado_por' => $gerente->name,
        //     'aprovado_em' => $rdo->aprovado_em->format('d/m/Y H:i')
        // ]);

        return back()->with('success', "RDO {$rdo->numero_rdo} aprovado com sucesso!");

    }

    public function gerarPdf(Rdo $rdo) 
    {
        set_time_limit('60'); // define o tempo máximo em 60 segundos
        // $rdo_equipamento = $rdo->equipamentos;  // Recupera os equipamentos relacionados a este RDO
        // $rdo_mao_obra = $rdo->maoObras;  // Recupera as mãos de obra relacionadas a este RDO
        // $rdo_gerente = $rdo->users;  // Recupera os usuários relacionados a este RDO
        $rdos = Rdo::with('obras', 'equipamentos', 'maoObraDiretas', 'maoObraIndiretas')->get(); // Recupera todos de uma vez
        // Gera o pdf com os dados necessários
        $pdf = Pdf::loadView('rdos.pdf', compact('rdo', 'rdo_equipamento', 'rdo_mao_obra', 'rdo_gerente'));

        $nomeArquivo = 'RDO_' . $rdo->numero_rdo . '.pdf';
        $caminho = storage_path('app/public/documentos/' . $nomeArquivo);
        file_put_contents($caminho, $pdf->output());

        //return $pdf->stream(); // visualiza no navegador
        return back()->with('success',"RDO salvo com sucesso em: {$caminho}");

    }

    // modo teste
    public function assinarPdf(Rdo $rdo)
    {
        $apiToken = 'd3085592-5bbb-4cee-bb23-fac71ea8fba3';
        
        // 1. Enviar documento
        $urlDocuments = 'https://sandbox.clicksign.com/api/v1/documents?access_token=' . $apiToken;
        $nomePdf = "RDO_{$rdo->id}.pdf";
        $localPdf = storage_path('app/public/documentos/' . $nomePdf);
        $pdf = file_get_contents($localPdf);
        
        $documentRequest = [
            'document' => [
                'path' => "/RDO_{$rdo->id}.pdf",
                'content_base64' => 'data:application/pdf;base64,' . base64_encode($pdf),
                'name' => "RDO {$rdo->id}",
                'locale' => 'pt-BR',
                'content_type' => 'pdf'
            ]
        ];

        // dd($documentRequest);

        $documentResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($urlDocuments, $documentRequest);

        // dd('documentResponse', $documentResponse->json());

        $documentKey = $documentResponse['document']['key'];

        // dd('documentKey', $documentKey);

        // teste endereço para visualizar o documento dentro da clicksign
        $urlVisualizarDocumento = 'https://sandbox.clicksign.com/api/v1/documents/' . $documentKey . '?access_token=' . $apiToken;
        
        // 2. Criar signatário (gerente)
        $signerName = 'Gabriel Jacobis';
        $signerEmail = 'gabrieljacobis@gmail.com';
        $urlSigners = 'https://sandbox.clicksign.com/api/v1/signers?access_token=' . $apiToken;


        $signerRequest = [
            'signer' => [
                'email' => $signerEmail,
                'phone_number' => '+5511999999999',
                'auths' => ['email'], // pode ser ['email', 'sms', 'certificado']
                'name' => $signerName,
                'documentation' => '12345678909', // CPF fictício (pra testes)
                'birthday' => '1980-01-01',
                'has_documentation' => true,
                'send_email_notification' => true
            ]
        ];

        // dd('signerRequest', $signerRequest);
        
        $signerResponse = Http::withHeaders([
            'Contet-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($urlSigners, $signerRequest);

        // dd('signerResponse', $signerResponse->json());

        $signerKey = $signerResponse['signer']['key'];
        
        // dd('signerKey', $signerKey);

        // 3. Associar signatário ao documento
        $urlSignature = 'https://sandbox.clicksign.com/api/v1/lists?access_token=' . $apiToken;

        $signatureRequest = [
            'list' => [
                'document_key' => $documentKey,
                'signer_key' => $signerKey,
                'sign_as' => 'approve', // 'approve' se for só para aprovar
                "message" => "Prezado gerente,\nPor favor assine o documento.\n\nQualquer dúvida estou à disposição.\n\nAtenciosamente,\nGabriel Jacobis"

            ]
        ];

        $signatureResponse = Http::withHeaders([
            'Contet-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($urlSignature, $signatureRequest);

        // dd('signatureResponse', $signatureResponse->json());

        $request_signature_key = $signatureResponse['list']['request_signature_key'];

        // 4. Solicitar assinatura por email
        $urlNotification = 'https://sandbox.clicksign.com/api/v1/notifications?access_token=' . $apiToken;

        $notificationRequest = [
            [
                'request_signature_key' => $request_signature_key,
                "message" => "Prezado gerente,\nPor favor assine o documento.\n\nQualquer dúvida estou à disposição.\n\nAtenciosamente,\nGabriel Jacobis",
                'url' => $urlVisualizarDocumento
            ]
        ];

        $notificationResponse = Http::withHeaders([
            'Contet-Type' => 'application/json',
            //'Accept' => 'application/json',
        ])->post($urlNotification, $notificationRequest);

        // dd('$notificationResponse', $notificationResponse->body());
        // dd('$notificationRequest', $notificationRequest);

        // dd($signatureResponse->body());

        return back()->with('success', "RDO {$rdo->numero_rdo} enviado para assinatura!");
                        // ->with('link_assinatura', $signUrl);
    }

}