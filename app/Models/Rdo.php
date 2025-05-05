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

    public function turnos()
    {
        return $this->hasMany(RdoTurno::class);
    }

    // Relacionamento um para muitos com Obra
    public function obras()
    {
        return $this->belongsTo(Obra::class, 'obra_id'); // retirei , 'id'
    }
    
    // Relacionamento muitos para muitos com Equipamento
    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class, 'rdo_equipamentos', 'rdo_id', 'equipamento_id')
                    ->withPivot(['...']); // 'rdo_equipamentos' é a tabela de relacionamento entre rdos e equipamentos, se retirar o Laravel busca por equipamento_rdo (que não existe)
    }

    // Relacionamento muitos para muitos com MaoObraDireta
    public function maoObraDiretas()
    {
        return $this->belongsToMany(MaoObraDireta::class, 'rdo_mao_obra_diretas'); // retirei , 'rdo_id', 'mao_obra_id'
    }

    // Relacionamento muitos para muitos com MaoObraIndireta
    public function maoObraIndiretas()
    {
        return $this->belongsToMany(MaoObraIndireta::class, 'rdo_mao_obra_indiretas'); // retirei , 'rdo_id', 'mao_obra_id'
    }
    
    // Relacionamento um para muitos com User
    public function users()
    {
        return $this->belongsTo(User::class, 'aprovado_por'); 
    }

    

}