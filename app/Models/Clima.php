<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clima extends Model
{
    use HasFactory;

    protected $fillable = ['clima'];

    /**
     * Um clima pode estar presente em vários RDOs (por meio da tabela rdo_climas)
     */
    public function rdoClimas()
    {
        return $this->hasMany(RdoClimas::class);
    }

    /**
     * Acesso direto aos RDOs através do relacionamento intermediário
     */
    public function rdos()
    {
        return $this->belongsToMany(Rdo::class, 'rdo_climas');
    }
}