<?php

namespace App\Http\Controllers;

use App\FolhaSalarial;
use Illuminate\Http\Request;
use PDF;
use App\Funcionario;
use App\Negocio\Globais;
use App\Salario;

class ReportController extends Controller
{

protected $globais;
    public function __construct(Globais $globais)
    {
      $this->globais = $globais;
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
        $folha = Salario::where('id', $id)->first();
        if(!$folha){
            return back()->with(['error'=>"Nao encontrou"]);
        }
        $folha_salarial = FolhaSalarial::where('id_salario', $id)->get();
        $this->globais->setMes($folha->mes);
        $mes = $this->globais->converterMes();

        $data = [
            'getFolha_salarial'=>$folha_salarial,
            'getMes'=>$mes
        ];
       
      $pdf = PDF::loadView("report.folha_salario", $data)->setPaper('A4', 'landscape');

      return $pdf->stream('folha_salario' . date('Y') . '.pdf');
      
    }


}
