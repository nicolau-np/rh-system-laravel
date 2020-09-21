<?php

namespace App\Http\Controllers;

use App\FolhaSalarial;
use Illuminate\Http\Request;
use PDF;
use App\Negocio\Calculos;
use App\Funcionario;
use App\TabelaIRT;

class ReportController extends Controller
{
public static $calculos;
public static $tabela_irt;
    public function __construct(Calculos $calculos, TabelaIRT $tabela_irt)
    {
        self::$calculos = $calculos;
        self::$tabela_irt = $tabela_irt;
    }


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

    public function guia_medica($id){
        echo "guia medica";
    }

    public function folha_salario($id)
    {
        $folha_salarial = FolhaSalarial::where('id_salario', $id)->get();
        $data = [
            'getFolha_salarial'=>$folha_salarial
        ];
       
      $pdf = PDF::loadView("report.folha_salario", $data)->setPaper('A4', 'landscape');

      return $pdf->stream('folha_salario' . date('Y') . '.pdf');
      
    }

    public static function irt($salario_iliquido, $ss){
        $ss_resto = ($salario_iliquido - $ss);
        $percentagem = 0;
        $irt = self::$tabela_irt->where('inicio','<=',$ss_resto)->where('ate','>=', $ss_resto)->first();
        if($irt){
            if($irt->inicio == 0){
                  return 0;
            }else{
      
              //calculo da percentagem nos 3 simples
              $percentagem = $irt->taxa_percentagem/100;
      
              $irt_resultado = self::$calculos->irt($ss_resto, $irt->parcela_fixa, $percentagem, $irt->excesso);
             return $irt_resultado;
             
            }
            
        }
    
    }
}
