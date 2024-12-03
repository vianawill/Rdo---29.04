<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_rdo',
        'data',
        'dia_da_semana',
        'obra_id',
        'manha',
        'tarde',
        'noite',
        'condicao_area',
        'acidente',
    ];

    // Relacionamento um para muitos com Obra
    public function obras()
    {
        return $this->belongsTo(Obra::class, 'obra_id'); // retirei , 'id'
    }
    
    // Relacionamento muitos para muitos com Equipamento
    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class, 'rdo_equipamentos'); // 'rdo_equipamentos' é a tabela de relacionamento entre rdos e equipamentos, se retirar o Laravel busca por equipamento_rdo (que não existe)
    }

    // Relacionamento muitos para muitos com MaoObra
    public function maoObras()
    {
        return $this->belongsToMany(MaoObra::class, 'rdo_mao_obras'); // retirei , 'rdo_id', 'mao_obra_id'
    }
}
