<?php

namespace App\Http\Controllers;

use App\Models\MaoObraIndireta;
use Illuminate\Http\Request;

class MaoObraIndiretaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mao_obra_indiretas = MaoObraIndireta::all();
        return view('mao_obra_indiretas.index', compact('mao_obra_indiretas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mao_obra_indiretas.create');
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
        MaoObraIndireta::create($validatedData);

        // Redireciona para a lista de mão de obra indireta com uma mensagem de sucesso
        return redirect()->route('mao_obra_indiretas.index')->with('success', 'Mão de Obra Indireta cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaoObraIndireta  $maoObraIndireta
     * @return \Illuminate\Http\Response
     */
    public function show(MaoObraIndireta  $maoObraIndireta)
    {
        return view('mao_obra_indiretas.show', compact('maoObraIndiretas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaoObraIndireta  $maoObraIndireta
     * @return \Illuminate\Http\Response
     */
    public function edit(MaoObraIndireta  $maoObraIndireta)
    {
        return view('mao_obra_indiretas.edit', compact('maoObraIndiretas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaoObraIndireta  $maoObraIndireta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaoObraIndireta  $maoObraIndireta)
    {
        $maoObraIndireta->update($request->all());
        return redirect()->route('mao_obra_indiretas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaoObraIndireta  $maoObraIndireta
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaoObraIndireta  $maoObraIndireta)
    {
        $maoObraIndireta->delete();
        return redirect()->route('mao_obra_indiretas.index')->with('success', 'Mão de Obra excluída com sucesso.');
    }
}