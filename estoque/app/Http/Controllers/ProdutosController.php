<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index() {
        $produtos = Produtos::all();
        return view('produtos.index', compact('produtos'));
    }

    public function create() {
        return view('produtos.create');
    }

    public function store(Request $request) {
        $produto = new Produtos;
        $produto->nome = $request->nome;
        $produto->validade = $request->validade;
        $produto->peso = $request->peso;
        $produto->tamanho = $request->tamanho;
        $produto->preco = $request->preco;
        $produto->cod_prod = $request->cod_prod;
        $produto->save();
        return redirect()->route('produtos.index');
    }

    public function show($id)
    {
        $produto = Produtos::findOrFail($id);
        return view('produtos.show', compact('produto'));
    }

    public function edit($id)
    {
        $produto = Produtos::findOrFail($id);
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id) {
        $produto = Produtos::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->validade = $request->validade;
        $produto->peso = $request->peso;
        $produto->tamanho = $request->tamanho;
        $produto->preco = $request->preco;
        $produto->cod_prod = $request->cod_prod;
        $produto->save();
        return redirect()->route('produtos.index');
    }

    public function destroy($id)
    {
        $produto = Produtos::findOrFail($id);
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}