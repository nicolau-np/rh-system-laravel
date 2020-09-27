<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faturacao extends Model
{
    protected $table = "faturacaos";

    protected $fillable = [
        'id_cliente',
        'mes',
        'ano',
        'quantidate',
        'pc_unitario',
        'total',
        'tipo',
        'descricao'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }
}
