<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdo extends Model
{
    use HasFactory;

    // Relacionamento um para muitos com Obra
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
    
    // Relacionamento muitos para muitos com Equipamento
    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class, 'rdo_equipamento');

        /* modelo sugerido antes
        return $this->belongsToMany(Equipamento::class, 'rdo_equipamento', 'rdo_id', 'equipamento_id');
        */
    }

    // Relacionamento muitos para muitos com MaoObra
    public function maoObras()
    {
        return $this->belongsToMany(MaoObra::class, 'rdo_mao_obra');
        
        /* modelo sugerido antes
        return $this->belongsToMany(MaoObra::class, 'rdo_mao_obra', 'rdo_id', 'mao_obra_id');
        */
    }
}
