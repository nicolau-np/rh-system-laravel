<?php

namespace App\Http\Controllers;

use App\FolhaSalarial;
use App\Salario;
use Illuminate\Http\Request;

class BalancoController extends Controller
{


    public function salario()
    {

        $data['meses'] = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
        ];
        $data = [
            'mes' => 1
        ];
        $cont_iliquido = 0;
        $folha_salario = FolhaSalarial::with(['salario' => function ($query) {
            $query->where('mes', 2);
        }])->get();

        $data = [
            'titulo' => "Balanços",
            'menu' => "B. Salários",
            'submenu' => "Gráfico",
            'tipo' => "grafico"
        ];
        return view("balanco.salario", $data);
    }
}