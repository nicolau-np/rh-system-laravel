<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "provincias";

    protected $fillable = [
        'id_pais',
        'provincia'
    ];

    public function pais(){
        return $this->belongsTo(Pais::class, 'id_pais', 'id');
    }
}
