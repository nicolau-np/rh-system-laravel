<?php

namespace App\Http\Controllers;

use App\FolhaSalarial;
use App\Salario;
use Illuminate\Http\Request;

class BalancoController extends Controller
{


    public function salario()
    {
        /*  $data['valores']['irt'] = 0;
            $data['valores']['ss'] = 0;
            $data['valores']['salario_liquido'] = 0;
            $data['valores']['salario_iliquido'] = 0;

            $salario = Salario::where('mes', $mes)
                ->where('ano', 2020)->first();
            if ($salario) {

                $folha_salario = FolhaSalarial::where('id_salario', $salario->id)->get();
                foreach ($folha_salario as $folha) {
                    $data['valores']['irt'] = $data['valores']['irt'] + $folha->des_irt;
                    $data['valores']['ss'] = $data['valores']['ss'] + $folha->des_ss;
                    $data['valores']['salario_liquido'] = $data['valores']['salario_liquido'] + $folha->salario_liquido;
                    $data['valores']['salario_iliquido'] = $data['valores']['salario_iliquido'] + $folha->salario_iliquido;
                }
            }

            echo  "Mes:" . $mes . " | IRT:" . $data['valores']['irt'] . " | SS:" . $data['valores']['ss'] . " 
                | Salario_iliquido:" . $data['valores']['salario_iliquido'] . " | Salario_liquido:" . $data['valores']['salario_liquido'] . "<br/>";
        
*/

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