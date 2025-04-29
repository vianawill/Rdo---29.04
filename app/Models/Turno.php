<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'turno',
    ];

    /**
     * Um turno pode estar presente em vários RDOs (por meio da tabela rdo_turnos)
     */
    public function rdoTurnos()
    {
        return $this->hasMany(RdoTurno::class);
    }

    /**
     * Acesso direto aos RDOs através do relacionamento intermediário
     */
    public function rdOs()
    {
        return $this->belongsToMany(Rdo::class, 'rdo_turnos');
    }
}