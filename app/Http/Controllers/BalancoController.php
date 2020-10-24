<?php

namespace App\Http\Controllers;

use App\FolhaSalarial;
use App\Salario;
use Illuminate\Http\Request;

class BalancoController extends Controller
{


    public function salario()
    {
        

        $data = [
            'titulo' => "Balanços",
            'menu' => "B. Salários",
            'submenu' => "Gráfico",
            'tipo' => "grafico"
        ];
        return view("balanco.salario", $data);
    }

    public static function getGrafico($mes, $data)
    {

        $retono = 0;

        $salario = Salario::where('mes', $mes)
            ->where('ano', 2020)->first();
        if ($salario) {

            $folha_salario = FolhaSalarial::where('id_salario', $salario->id)->get();
            if ($data == "salario_iliquido") {
                foreach ($folha_salario as $folha) {
                    $retono = $retono + $folha->salario_iliquido;
                }
            } elseif ($data == "salario_liquido") {
                foreach ($folha_salario as $folha) {
                    $retono = $retono + $folha->salario_liquido;
                }
            } elseif ($data == "irt") {
                foreach ($folha_salario as $folha) {
                    $retono = $retono + $folha->des_irt;
                }
            } elseif ($data == "ss") {
                foreach ($folha_salario as $folha) {
                    $retono = $retono + $folha->des_ss;
                }
            }
        } else {
            $retono = 0;
        }


        return $retono;
    }
}