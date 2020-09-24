<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamentos";

    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function dep_cargo(){
        return $this->hasMany(DepartamentoCategoria::class, 'id_departamento', 'id');
    }
}
