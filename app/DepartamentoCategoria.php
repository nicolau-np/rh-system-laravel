<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartamentoCategoria extends Model
{
    protected $table = "departamento_categorias";

    protected $fillable = [
        'id_departamento',
        'id_categoria',
        'descricao'
    ];

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id_categoria', 'id');
    }

    public function departamento(){
        return $this->hasMany(Departamento::class, 'id_departamento', 'id');
    }
}
