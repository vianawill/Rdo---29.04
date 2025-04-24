<?php

namespace App\Http\Controllers;

use App\Models\Rdo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    // Busque os RDOs do banco de dados
    $rdos = Rdo::latest()->take(3)->get(); // Ajuste a lógica conforme necessário

    // Retorne a view com a variável $rdos
    return view('home', compact('rdos'));
}
}