<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaoObra extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcao',
    ];

    public function rdos()
    {
        // Relacionamento muitos para muitos com Rdo
        return $this->belongsToMany(Rdo::class, 'rdo_mao_obras', 'mao_obra_id', 'rdo_id');
    }
}
