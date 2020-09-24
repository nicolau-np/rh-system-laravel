<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargos";

    protected $fillable = [
        'cargo',
        'salario_base'
    ];

    public function funcionario(){
        return $this->hasOne(Funcionario::class, 'id_cargo', 'id');
    }

    public function dep_cargo(){
        return $this->hasMany(DepartamentoCategoria::class, 'id_categoria', 'id');
    }
}
