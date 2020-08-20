<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSubcidio extends Model
{
    protected $table = "tipo_subcidios";

    protected $fillable = [
        'tipo'
    ];

    public function subcidios(){
        return $this->hasMany(Subcidio::class, 'id_tipo', 'id');
    }
}
