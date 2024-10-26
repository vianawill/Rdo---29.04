<?php

namespace App\Models;

class Pedido {
    // Atributos: numeroPedido, status, valorTotal 
    public $numeroPedido, $status, $valorTotal;

    // Constructor
    public function __construct($numeroPedido, $status, $valorTotal) {
        $this->numeroPedido = $numeroPedido;
        $this->status = $status;
        $this->valorTotal = $valorTotal;
    }

    public function obterDados() {
        return "O pedido número $this->numeroPedido está $this->status, e o valor total é de R$ $this->valorTotal";
    }
}