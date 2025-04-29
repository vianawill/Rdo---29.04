<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::all();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        return view('turnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'turno' => 'required|string|max:255|unique:turnos',
        ]);

        Turno::create($request->all());

        return redirect()->route('turnos.index')->with('success', 'Turno cadastrado com sucesso.');
    }

    public function edit(Turno $turno)
    {
        return view('turnos.edit', compact('turno'));
    }

    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'turno' => 'required|string|max:255|unique:turnos,turno,' . $turno->id,
        ]);

        $turno->update($request->all());

        return redirect()->route('turnos.index')->with('success', 'Turno atualizado com sucesso.');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();

        return redirect()->route('turnos.index')->with('success', 'Turno excluído com sucesso.');
    }
}