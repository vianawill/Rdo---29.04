<?php

namespace App\Http\Controllers;

use App\Models\MaoObraDireta;
use Illuminate\Http\Request;

class MaoObraDiretaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mao_obra_diretas = MaoObraDireta::all();
        return view('mao_obra_diretas.index', compact('mao_obra_diretas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mao_obra_diretas.create');
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
            'funcao' => 'required|string|max:255',
            'quant' => 'required'
        ]);
                
        // Criação da mão de obra
        MaoObraDireta::create($validatedData);

        // Redireciona para a lista de mão de obra com uma mensagem de sucesso
        return redirect()->route('mao_obra_diretas.index')->with('success', 'Mão de Obra Direta cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaoObraDireta  $maoObraDireta
     * @return \Illuminate\Http\Response
     */
    public function show(MaoObraDireta $maoObraDireta)
    {
        return view('mao_obra_diretas.show', compact('mao_obra_diretas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaoObraDireta  $maoObraDireta
     * @return \Illuminate\Http\Response
     */
    public function edit(MaoObraDireta  $maoObraDireta)
    {
        return view('mao_obra_diretas.edit', compact('maoObraDireta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaoObraDireta  $maoObraDireta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaoObraDireta  $maoObraDireta)
    {
        $maoObraDireta->update($request->all());
        return redirect()->route('mao_obra_diretas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaoObraDireta  $maoObraDireta
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaoObraDireta  $maoObraDireta)
    {
        $maoObraDireta->delete();
        return redirect()->route('mao_obra_diretas.index')->with('success', 'Mão de Obra excluída com sucesso.');
    }
}