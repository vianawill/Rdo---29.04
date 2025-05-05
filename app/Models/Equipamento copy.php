<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    // Relacionamento muitos para muitos com Rdo
    public function rdos()
    {
        return $this->belongsToMany(Rdo::class)->withPivot('quant');
    }
}