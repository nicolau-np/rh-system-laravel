<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    protected $table = "ferias";

    protected $fillable = [
        'id_funcionario',
        'data_entrada',
        'data_saida',
        'estado',
        'ano',
        'numero'
    ];

    public function funcionario(){
        return $this->belongsTo(Funcinario::class, 'id_funcionario', 'id');
    }
}
