<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    protected $table = "candidaturas";

    protected $fillable = [
        'nome',
        'curso',
        'ensino',
        'instituicao',
        'data_nascimento',
        'genero',
    ];

    public function docs_candidatura(){
        return $this->hasMany(DocsCandidatura::class, 'id_candidatura', 'id');
    }
}
