<?php

namespace App\Http\Controllers;

use App\Models\MaoObra;
use App\Models\Obra;
use Illuminate\Http\Request;

class MaoObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mao_obras = MaoObra::all();
        return view('mao_obras.index', compact('mao_obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mao_obras.create');
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
        ]);
                
        // Criação da mão de obra
        MaoObra::create($validatedData);

        // Redireciona para a lista de mão de obra com uma mensagem de sucesso
        return redirect()->route('mao_obras.index')->with('success', 'Mão de Obra cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaoObra  $maoObra
     * @return \Illuminate\Http\Response
     */
    public function show(MaoObra $maoObra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaoObra  $maoObra
     * @return \Illuminate\Http\Response
     */
    public function edit(MaoObra $maoObra)
    {
        return view('mao_obras.edit', compact('maoObra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaoObra  $maoObra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaoObra $maoObra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaoObra  $maoObra
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaoObra $maoObra)
    {
        //
    }
}
