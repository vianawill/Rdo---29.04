<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaoObra extends Model
{
    use HasFactory;

    // Relacionamento muitos para muitos com Rdo
    public function rdos()
    {
        return $this->belongsToMany(Rdo::class, 'rdo_mao_obra', 'mao_obra_id', 'rdo_id');
    }
}
