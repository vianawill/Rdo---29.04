<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaoObraDireta extends Model
{
    use HasFactory;

    protected $fillable = ['funcao'];

    public function rdos()
    {
        // Relacionamento muitos para muitos com Rdo
        return $this->belongsToMany(Rdo::class)->withPivot('quant');
    }
}