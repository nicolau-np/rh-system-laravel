<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuiaMedica extends Model
{
    protected $table = "guia_medicas";

    protected $fillable = [
        'id_funcionario',
        'local_apresentar',
        'data_repouso',
        'data_retoma',
        'prescricao_medica',
        'ano',
        'numero',
        'estado'
    ];

    public function funcionario(){
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id');
    }
}
