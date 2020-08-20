<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFalta extends Model
{
    protected $table = "tipo_faltas";

    protected $fillable = [
        'tipo',
        'desconto'
    ];

    public function faltas(){
        return $this->hasMany(Falta::class, 'id_tipo', 'id');
    }
}
