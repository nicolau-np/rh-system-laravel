<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = "municipios";

    protected $fillable = [
        'id_provincia',
        'municipio'
    ];

    public function provincia(){
        return $this->belongsTo(Provincia::class, 'id_provincia', 'id');
    }
}
