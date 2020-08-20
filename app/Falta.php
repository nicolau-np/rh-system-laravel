<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    protected $table = "faltas";

    protected $fillable = [
        'id_tipo',
        'id_funcionario',
        'motivo',
        'dia_semana',
        'mes',
        'ano',
        'estado'
    ];

    public function tipo_falta(){
        return $this->belongsTo(TipoFalta::class, 'id_tipo', 'id');
    }

    public function funcionario(){
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id');
    }
}
