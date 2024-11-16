<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'empresa_contratada',
        'objeto_contrato',
        'tempo_total_contrato',
        'data_prevista_inicio_obra',
        'data_real_inicio_obra',
        'data_prevista_termino_obra',
        'data_real_termino_obra',
        'descricao',
    ];

    public function rdos()
    {
        return $this->hasMany(Rdo::class);
    }
}