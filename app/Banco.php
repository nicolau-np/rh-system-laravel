<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "bancos";

    protected $fillable = [
        'banco',
        'sigla'
    ];

    public function conta_bancarias(){
        return $this->hasMany(ContaBancaria::class, 'id_banco', 'id');
    }
}
