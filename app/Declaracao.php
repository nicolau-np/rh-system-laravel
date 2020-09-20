<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaracao extends Model
{
   protected $table = "declaracaos";

   protected $fillable = [
       'id_funcionario',
       'ano',
       'numero',
       'efeito'
   ];

   public function funcionario(){
       return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id');
   }
}
