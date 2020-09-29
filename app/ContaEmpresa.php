<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaEmpresa extends Model
{
    protected $table = "conta_empresas";

    protected $fillable = [
        'id_banco',
        'id_empresa',
        'conta',
        'iban'
    ];

    public function banco(){
        return $this->belongsTo(Banco::class, 'id_banco', 'id');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }
}
