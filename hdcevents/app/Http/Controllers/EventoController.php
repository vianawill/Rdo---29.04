<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index() {
        $eventos = Evento::all();
        return view('index', ['eventos' => $eventos]);
    }
    
    public function produtos() {
        $nome = "Tião";
        $idade = "30";
        return view('produtos', ['nome' => $nome, 'idade' => $idade]);
    }

    public function create() {
        return view('eventos.create');
    }

}