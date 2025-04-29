<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdoTurno extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'numero_rdo',
        // 'data',
        // 'dia_da_semana',
        // 'obra_id',
        // 'manha',
        // 'tarde',
        // 'noite',
        // 'condicao_area',
        // 'acidente',
    ];

    public function equipamentos()
    {
        return $this->hasMany(RdoTurnoEquipamento::class);
    }

    public function maoObraDiretas()
    {
        return $this->hasMany(RdoTurnoMaoObraDireta::class);
    }

    public function maoObraIndiretas()
    {
        return $this->hasMany(RdoTurnoMaoObraIndireta::class);
    }

}