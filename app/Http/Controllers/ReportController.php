<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{


    public function declaracao($id)
    {
        echo "Declaracao:" . $id;
    }

    public function carta_recomend($id)
    {
        echo "Carta de Recomend:" . $id;
    }

    public function guia_feria($id)
    {
        echo "PDF ferias:" . $id;
    }

    public function folha_salario($id)
    {
        echo "folha salario";
    }
}
