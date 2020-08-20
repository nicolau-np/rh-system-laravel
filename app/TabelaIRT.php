<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelaIRT extends Model
{
    protected $table = "tabela_i_r_t_s";

    protected $fillable = [
        'escalao',
        'inicio',
        'ate',
        'parcela_fixa',
        'taxa_percentagem',
        'taxa_numeral',
        'excesso'
    ];

}
