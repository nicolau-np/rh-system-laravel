<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    protected $table = "tipo_docs";

    protected $fillable = [
        'tipo'
    ];

    public function docs_escaneados(){
        return $this->hasMany(DocsEscaneado::class, 'id_tipo', 'id');
    }
}
