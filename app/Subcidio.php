<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcidio extends Model
{
    protected $table = "subcidios";

    protected $fillable = [
        'id_tipo',
        'id_cargo',
        'salario'
    ];

    public function tipo_subcidio(){
        return $this->belongsTo(TipoSubcidio::class, 'id_tipo', 'id');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }
}
