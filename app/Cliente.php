<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    protected $fillable = [
        'id_municipio',
        'nome',
        'inicio_contrato',
        'fim_contrato',
        'tipo',
        'tipo_servico'
    ];

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }

    public function faturacao(){
        return $this->hasMany(Faturacao::class, 'id_cliente', 'id');
    }
}
