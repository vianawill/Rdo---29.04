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
        $obras = Obra::all();  // Recupera todas as obras
        return view('mao_obras.create', compact('obras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
