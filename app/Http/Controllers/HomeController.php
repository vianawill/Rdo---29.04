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
    // Busque os RDOs pendentes
    $rdosPendentes = Rdo::where('status', 'pendente')->latest()->take(3)->get();

    // Busque os últimos RDOs aprovados
    $rdosAprovados = Rdo::where('status', 'aprovado')->latest()->take(3)->get();

    // Retorne a view com as variáveis $rdosPendentes e $rdosAprovados
    return view('home', compact('rdosPendentes', 'rdosAprovados'));
    
}
}