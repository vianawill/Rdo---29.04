<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Rdo;
use App\Models\Obra;
use App\Models\Equipamento;
use App\Models\MaoObra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RdoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdos = Rdo::all();
        $rdos = Rdo::with('obras')->get(); // Recupera todos os RDos com obras associadas
        $rdos = Rdo::with('equipamentos')->get(); // Recupera todos os RDos com equipamentos associados
        $rdos = Rdo::with('maoObras')->get(); // Recupera todos os RDos com mão de obras associadas

        return view('rdos.index', compact('rdos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obras = Obra::all();  // Recupera todas as obras
        $equipamentos = Equipamento::all();  // Recupera todos os equipamentos
        $maoObras = MaoObra::all();  // Recupera todas as mãos de obra

        return view('rdos.create', compact('obras', 'equipamentos', 'maoObras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'numero_rdo' => 'required|string|max:255',
            'data' => 'required|date',
            'obra_id' => 'required|exists:obras,id',
            'dia_da_semana' => 'required|string|max:255',
            'manha' => 'required|string|max:255',
            'tarde' => 'required|string|max:255',
            'noite' => 'required|string|max:255',
            'condicao_area' => 'required|string|max:255',
            'acidente' => 'required|string|max:255', // Validação para acidente
            'equipamentos' => 'array|exists:equipamentos,id', // validação para IDs de equipamentos
            'maoobras' => 'array|exists:maoobras,id', // continua funcionando - teste: estava mao_obras,id - vou alterar para maoobras,id - se falhar no cadstro de rdo, refere-se ao nome da tabela. // validação para IDs de mão de obras
        ]);
        
        // Criação do RDO
        $rdo = Rdo::create($validatedData);

        // Relacionar obras ao RDO
        if ($request->has('obras')) {
            $rdo->Obras()->sync($request->obras);
        }

        // Relacionar equipamentos ao RDO
        if ($request->has('equipamentos')) {
            $rdo->equipamentos()->sync($request->equipamentos);
        }
        
        // Relacionar mão de obras ao RDO
        if ($request->has('mao_obras')) { // tem referência com a tabela, fiz testes
            $rdo->maoobras()->sync($request->mao_obras); // tem referência com a tabela, fiz testes
        }

        return redirect()->route('rdos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rdo  $rdo
     * @return \Illuminate\Http\Response
     */
    public function show(Rdo $rdo)
    {
        $rdo_equipamento = $rdo->equipamentos;  // Recupera os equipamentos relacionados a este RDO
        $rdo_mao_obra = $rdo->maoObras;  // Recupera as mãos de obra relacionadas a este RDO

        return view('rdos.show', compact('rdo', 'rdo_equipamento', 'rdo_mao_obra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rdo  $rdo
     * @return \Illuminate\Http\Response
     */
    public function edit(Rdo $rdo)
    {
        $obras = Obra::all();  // Recupera todas as obras
        $equipamentos = Equipamento::all();  // Recupera todos os equipamentos
        $maoObras = MaoObra::all();  // Recupera todas as mãos de obra

        return view('rdos.edit', compact('rdo', 'obras', 'equipamentos', 'maoObras'));
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
        $rdo -> delete();

        return redirect()->route('rdos.index')->with('success', 'RDO excluído com sucesso.');
    }
    
    public function aprovar(Rdo $rdo)
    {
        $gerente = Auth::user(); // gerente logado

        // Verifica se o gerente já aprovou (evita duplicidade)
        // if ($rdo->aprovado_por) {
        //     return response()->json([
        //         'message' => 'Este RDO já foi aprovado.'
        //     ], 400);
        // }

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
        $rdo_equipamento = $rdo->equipamentos;  // Recupera os equipamentos relacionados a este RDO
        $rdo_mao_obra = $rdo->maoObras;  // Recupera as mãos de obra relacionadas a este RDO
        $rdo_gerente = $rdo->users;  // Recupera os usuários relacionados a este RDO
        
        // Gera o pdf com os dados necessários
        $pdf = Pdf::loadView('rdos.pdf', compact('rdo', 'rdo_equipamento', 'rdo_mao_obra', 'rdo_gerente'));

        $nomeArquivo = 'RDO_' . $rdo->numero_rdo . '.pdf';
        $caminho = storage_path('app/public/documentos/' . $nomeArquivo);
        file_put_contents($caminho, $pdf->output());

        //return $pdf->stream(); // visualiza no navegador
        return back()->with('success',"RDO salvo com sucesso em: {$caminho}");

    }

    public function assinarPdf(Rdo $rdo)
    {
        $pdfRelativePath = "documentos/RDO_{$rdo->id}.pdf";

        // Log::info('$pdfRelativePath: ' . $pdfRelativePath);
        // Log::info('Assinatura iniciada para RDO ID: ' . $rdo->id);

        if (!Storage::disk('public')->exists($pdfRelativePath)) {
            return back()->with('error', 'PDF não encontrado.');
        }

        // Log::info('->exists($pdfRelativePath): ' . $pdfRelativePath);

        // Caminho completo pra enviar no corpo do POST
        $pdfPath = storage_path("app/public/" . $pdfRelativePath);

        // Log::info('Caminho completo PDF: ' . $pdfPath);
        // Log::info('Arquivo existe fisicamente? ' . (file_exists($pdfPath) ? 'Sim' : 'Não'));

        // dd([
        //     'existe_laravel' => Storage::disk('public')->exists("documentos/RDO_{$rdo->id}.pdf"),
        //     'caminho' => storage_path("app/public/documentos/RDO_{$rdo->id}.pdf"),
        // ]);
        $apiToken = 'd3085592-5bbb-4cee-bb23-fac71ea8fba3'; // ← cole aqui seu token
        $signerName = 'Gabriel Jacobis';
        $signerEmail = 'gabrieljacobis@gmail.com';

        // 1. Criar signatário (gerente)
        $signerResponse = Http::post("https://sandbox.clicksign.com/api/v1/signers?access_token=$apiToken", [
            'signer' => [
                'email' => $signerEmail,
                'name' => $signerName,
                'documentation' => '12345678909', // CPF fictício (pra testes)
                'birthday' => '1980-01-01',
                'phone_number' => '+5511999999999',
                'auths' => ['email'], // pode ser ['email', 'sms', 'certificado']
                'has_documentation' => true
            ]
        ]);

        //Log::info('Signatário criado', $signerResponse->json());

        // if (!$signerResponse->successful()) {
        //     Log::error('Erro ao criar signatário', $signerResponse->json());
        //     return back()->with('erro', 'Erro ao criar signatário.');
        // }

        $signerKey = $signerResponse['signer']['key'];

        //Log::info('SignerKey: ', $signerKey->json());

        // 2. Enviar documento
        $file = file_get_contents($pdfPath);
        
        // if (!$file) { // adcionado para teste
        //     Log::error('❌ Erro ao ler o arquivo PDF no caminho: ' . $pdfPath);
        //     return back()->with('error', 'Erro ao ler o PDF para assinatura.');
        // }

        // $documentResponse = Http::post("https://sandbox.clicksign.com/api/v1/documents?access_token=$apiToken", [
        $documentPayload = [ // substituído por
            'document' => [
                'path' => "/RDO_{$rdo->id}_" . time() . '.pdf',
                'content_base64' => 'data:application/pdf;base64,' . base64_encode($file),
                'name' => "RDO {$rdo->id}",
                'content_type' => 'application/pdf',
                'locale' => 'pt-BR',
            ]
        ];

        $apiUrl = "https://sandbox.clicksign.com/api/v1/documents?access_token=$apiToken";

        $documentResponse = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->send('POST', $apiUrl, [
            'body' => json_encode($documentPayload),
        ]);

        //$responseJson = $documentResponse->json();

        if (!$documentResponse->successful()) {
            Log::error('Erro ao enviar documento', $documentResponse->json());
            return back()->with('erro', 'Erro ao enviar documento.');
        }

        $documentKey = $documentResponse['document']['key'];

        Log::info('👉 Iniciando assinatura...');

        // 3. Associar signatário ao documento
        $signatureResponse = Http::post("https://sandbox.clicksign.com/api/v1/signatures?access_token=$apiToken", [
            'signature' => [
                'document_key' => $documentKey,
                'signer_key' => $signerKey,
                'sign_as' => 'sign', // ou 'approve' se for só para aprovar
                'sign_url' => true
            ]
        ]);

        Log::info('📨 Resposta da assinatura (raw): ' . $signatureResponse->body());
        Log::info('📨 Status code: ' . $signatureResponse->status());

        if (!$signatureResponse->successful()) {
            return back()->with('erro', 'Erro ao vincular signatário.');
        }
        if ($signatureResponse->successful()) {
            return back()->with('success', 'Signatário vinculado.');
        }

        // 4. Gerar link de assinatura
        $signatureData = $signatureResponse->json();
        $signUrl = $signatureData['signature']['url'] ?? null;

        Log::info('$signUrl: ' . $signUrl);

        dd($signatureResponse);

        return redirect()->route('rdos.show', $rdo->id)
                        ->with('success', 'Documento enviado para assinatura!')
                        ->with('link_assinatura', $signUrl);
    }
    
    

}
