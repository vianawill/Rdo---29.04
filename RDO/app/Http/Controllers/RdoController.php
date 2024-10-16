<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RdoController extends Controller
{
    public function gerarRdo(Request $request)
    {
        // Validação dos campos
        $validatedData = $request->validate([
            'numero' => 'required|string',
            'data' => 'required|date',
            'obra' => 'required|string',
        ]);

        // Exemplo: Você pode salvar os dados no banco de dados ou realizar outras ações

        // Retorna uma mensagem de sucesso
        return back()->with('success', 'RDO Gerado com sucesso!');
    }
}

