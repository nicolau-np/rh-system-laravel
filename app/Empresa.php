<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";

    protected $fillable = [
        'nome',
        'nif',
        'telefone',
        'endereco',
        'telefone_fixo',
        'email',
        'site',
        'descricao_servico',
        'data_aniversario',
        'logotipo'
    ];

    public function conta_empresa(){
        return $this->hasMany(ContaEmpresa::class, 'id_empresa', 'id');
    }

}
