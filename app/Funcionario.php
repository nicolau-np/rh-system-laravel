<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = "funcionarios";

    protected $fillable = [
        'id_pessoa',
        'id_cargo',
        'salario_base',
        'data_entrada',
        'data_saida',
        'total_filho',
        'campo1',
        'campo2'
    ];


    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class, 'id_cargo', 'id');
    }

    public function Docs_escaneados(){
        return $this->hasMany(DocsEscaneado::class, 'id_funcionario', 'id');
    }

    public function faltas(){
        return $this->hasMany(Falta::class, 'id_funcionario', 'id');
    }

    public function ferias(){
        return $this->hasMany(Feria::class, 'id_funcionario', 'id');
    }

    public function conta_bancaria(){
        return $this->hasOne(ContaBancaria::class, 'id_funcionario', 'id');
    }

    public function folha_salarial(){
        return $this->hasMany(FolhaSalarial::class, 'id_funcionario', 'id');
    }

    public function guia_medica(){
        return $this->hasMany(GuiaMedica::class, 'id_funcionario', 'id');
    }

    public function declaracao(){
        return $this->hasMany(Declaracao::class, 'id_funcionario', 'id');
    }

}