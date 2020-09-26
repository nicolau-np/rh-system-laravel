<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipios";

    protected $fillable = [
        'id_provincia',
        'municipio'
    ];

    public function provincia(){
        return $this->belongsTo(Provincia::class, 'id_provincia', 'id');
    }

    public function clientes(){
        return $this->hasOne(Cliente::class, 'id_municipio', 'id');
    }

    public function pessoa(){
        return $this->hasOne(Pessoa::class, 'id_municipio', 'id');
    }
}
