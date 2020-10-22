<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolhaSalarial extends Model
{
    protected $table = "folha_salarials";

    protected $fillable = [
        'id_salario',
        'id_funcionario',
        'salario_base',
        'total_faltas',
        'salario_iliquido',

        'sub_alimentacao',
        'sub_transporte',
        'sub_comunicacao',

        'des_irt',
        'des_ss',
        'des_falta',
        'des_total',
        'salario_liquido'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id');
    }

    public function salario()
    {
        return $this->belongsTo(Salario::class, 'id_salario', 'id');
    }
}