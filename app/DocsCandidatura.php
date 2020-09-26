<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocsCandidatura extends Model
{
    protected $table = "docs_candidaturas";

    protected $fillable = [
        'id_candidatura',
         'arquivo'
    ];

    public function candidatura(){
        return $this->belongsTo(Candidatura::class, 'id_candidatura', 'id');
    }
}
