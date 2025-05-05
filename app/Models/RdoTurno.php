<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RdoTurno extends Model
{
    use HasFactory;

    protected $fillable = [
        'rdo_id',
        'turno_id',
        'clima_id'
    ];

    public function rdo()
    {
        return $this->belongsTo(Rdo::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function clima()
    {
        return $this->belongsTo(Clima::class);
    }

}