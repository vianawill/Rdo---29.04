<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;

class PedidoController extends Controller
{
    // Classe: Pedido 
    // Atributos: numeroPedido, status, valorTotal 
    // Metodos: atualizarStatus, calcularTotal
    // Explicação: A classe "Pedido" gerencia os detalhes de um pedido feito por um cliente. 
    // Os atributos incluem o número do pedido, o status e o valor total. 
    // Os métodos permitem atualizar o status do pedido e calcular o valor total.

    public function pedido() {
        //instaciando a classe Pedido
        $meuPedido = new Pedido('001', 'concluído', '562,83');
        $dados = $meuPedido->obterDados();
        return view('pedido', compact('meuPedido', 'dados'));
    }
}