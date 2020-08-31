<?php

namespace App\Http\Controllers;

use App\Falta;
use App\Funcionario;
use App\Negocio\Calculos;
use App\Negocio\Globais;
use App\Pessoa;
use App\TabelaIRT;
use App\TipoFalta;
use App\Cargo;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PDF;

class RelatorioController extends Controller
{
    protected $funcionario;
    protected $pessoa;
    protected $globais;
    public static $calculos;
    public $cargos;

    public function __construct(Funcionario $funcionario, Pessoa $pessoa, Globais $globais, Calculos $calculos, Cargo $cargo)
    {
        $this->funcionario = $funcionario;
        $this->pessoa = $pessoa;
        $this->globais = $globais;
        self::$calculos = $calculos;
        $this->cargos = $cargo;
    }

    public function create_folha()
    {
        $cargos = $this->cargos->all(); 
        $data = [
            'titulo' => "Folha de Salário",
            'menu' => "Funcionários",
            'submenu' => "Folha de Salário",
            'tipo' => "form",
            'getCargos'=>$cargos
        ];

        return view('relatorio.new_folha', $data);
    }

    public function export_folha(Request $request)
    {
        $request->validate(
            [
                'mes' => ['required', 'Integer'],
                'ano' => ['required', 'Integer']
            ]
        );

        $this->globais->setMes($request->mes);
        $mes_extenso = $this->globais->converterMes();


        $funcionario = $this->funcionario->all();

        $data = [
            'getFuncionarios' => $funcionario,
            'mesExtenso' => $mes_extenso,
            'ano' => $request->ano,
            'mes' => $request->mes
        ];

        $pdf = PDF::loadView('relatorio.exports.folha_salario', $data)->setPaper('A4', 'landscape');

        return $pdf->stream('folha_salario_' . $mes_extenso . '-' . date('Y') . '.pdf');

        
    }

    public static function ver_falta($id_funcionario, $ano, $mes)
    {

        $data = [
            'mes' => $mes,
            'id_funcionario' => $id_funcionario,
            'ano' => $ano,
            'estado' => "on"
        ];
        $falta = Falta::where($data)->get();


        return $falta;
    }

    public static function seg_social($salario_base)
    {
        $seg_social = self::$calculos->inss_desconto($salario_base);
        return $seg_social;
    }

    public static function irt($salario_base, $inss_desconto)
    {
        $inss_resto = $salario_base - $inss_desconto; 
       $percentagem = 0;

      $irt = TabelaIRT::where('inicio','<=',$salario_base)->where('ate','>=', $salario_base)->first();

  if($irt){
      if($irt->inicio == 0){
return 0;
      }else{

        //calculo da percentagem nos 3 simples
        $percentagem = (0.03 * $irt->taxa_percentagem)/3;

        $irt_resultado = self::$calculos->irt($inss_resto, $inss_desconto, $percentagem, $irt->excesso);
        return $irt_resultado;
      }
      
  }

       
    }

    public function setPrioridade(Request $request){
        $request->session()->push('prioridade', $request->prioridade);
    }
    public function remPrioridade(Request $request){
$request->session()->forget('prioridade');
    }

    public static function getFuncionarioPriorit($id){
$funcionario = Funcionario::where('id_cargo', $id)->get();
return $funcionario;
    }
}
