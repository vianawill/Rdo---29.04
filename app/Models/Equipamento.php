<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    // Relacionamento muitos para muitos com Rdo
    public function rdos()
    {
        return $this->belongsToMany(Rdo::class, 'rdo_equipamento');
        
        /* modelo sugerido antes
        return $this->belongsToMany(Rdo::class, 'rdo_equipamento', 'equipamento_id', 'rdo_id');
        */
    }
}
