<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
    protected $table = "salarios";

    protected $fillable = [
        'mes',
        'ano'
    ];

    public function folha_salarial(){
        return $this->hasMany(FolhaSalarial::class, 'id_salario', 'id');
    }
}
