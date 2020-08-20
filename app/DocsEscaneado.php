<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocsEscaneado extends Model
{
    protected $table = "docs_escaneados";

    protected $fillable = [
        'id_tipo',
        'id_funcionario',
        'ficheiro'
    ];

    public function tipo_documento(){
        return $this->belongsTo(TipoDoc::class, 'id_tipo', 'id');
    }
    
    public function funcionario(){
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id');
    }
  
}
