<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Rdo;
use App\Models\Obra;
use App\Models\Equipamento;
use App\Models\MaoObra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function gerarPdf(Rdo $rdo) 
    {
        set_time_limit('300'); // define o tempo máximo em 300 segundos
        $rdo_equipamento = $rdo->equipamentos;  // Recupera os equipamentos relacionados a este RDO
        $rdo_mao_obra = $rdo->maoObras;  // Recupera as mãos de obra relacionadas a este RDO
        $pdf = Pdf::loadView('rdos.pdf', compact('rdo', 'rdo_equipamento', 'rdo_mao_obra'));

        return $pdf->stream(); // retirei ('rdo_' . $rdo->id . '.pdf')
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
        $rdo = Rdo::findOrFail($id); // busca o RDO

        // Verifica se o gerente já aprovou (evita duplicidade)
        if ($rdo->aprovado_por) {
            return response()->json([
                'message' => 'Este RDO já foi aprovado.'
            ], 400);
        }

        // Monta os dados para o hash
        $dados = $gerente->id . '|' .
                $gerente->name . '|' .
                $gerente->email . '|' .
                $rdo->id . '|' .
                now()->toDateTimeString();

        // Gera o hash com SHA-256
        $hash = hash('sha256', $dados);

        // Atualiza o RDO
        $rdo->aprovado_por = $gerente->id;
        $rdo->aprovado_em = now();
        $rdo->hash_aprovacao = $hash;
        $rdo->status = 'Aprovado';
        $rdo->save();

        return response()->json([
            'message' => 'RDO aprovado com sucesso!',
            'hash_aprovacao' => $hash,
            'aprovado_por' => $gerente->name,
            'aprovado_em' => $rdo->aprovado_em->format('d/m/Y H:i')
        ]);

        return redirect()->route('rdos.index')->with('success', "RDO {$rdo->numero_rdo} aprovado com sucesso!");

    }

}
