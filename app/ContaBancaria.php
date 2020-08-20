<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    protected $table = "conta_bancarias";

    protected $fillable = [
        'id_banco',
        'id_funcionario',
        'conta',
        'iban'
    ];

    public function banco(){
        return $this->belongsTo(Banco::class, 'id_banco', 'id');
    }

    public function funcionario(){
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id');
    }
}
