<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    protected $fillable = [
        'id_municipio',
        'nome',
        'genero',
        'data_nascimento',
        'estado_civil',
        'telefone',
        'bi',
        'data_emissao',
        'local_emissao',
        'comuna',
        'foto',
        'pai',
        'mae'
    ];

    public function municipio(){
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }

    public function usuario(){
        return $this->hasOne(User::class, 'id_pessoa', 'id');
    }

    public function funcionario(){
        return $this->hasOne(Funcionario::class, 'id_pessoa', 'id');
    }


}
