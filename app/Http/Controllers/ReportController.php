<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{


    public function declaracao($id)
    {
        echo "Declaracao";
    }

    public function carta_recomend($id)
    {
        echo "Carta de Recomendacao";
    }

    public function guia_feria($id)
    {
        echo "guia ferias";
    }

    public function folha_salario($id)
    {
        echo "folha salario";
    }

    public function guia_medica($id){
        echo "guia medica";
    }
}
