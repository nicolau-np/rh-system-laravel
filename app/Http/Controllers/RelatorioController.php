<?php

namespace App\Http\Controllers;

use App\Falta;
use App\Funcionario;
use App\Negocio\Calculos;
use App\Negocio\Globais;
use App\Pessoa;
use App\TabelaIRT;
use App\TipoFalta;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PDF;

class RelatorioController extends Controller
{
    protected $funcionario;
    protected $pessoa;
    protected $globais;
    public static $calculos;

    public function __construct(Funcionario $funcionario, Pessoa $pessoa, Globais $globais, Calculos $calculos)
    {
        $this->funcionario = $funcionario;
        $this->pessoa = $pessoa;
        $this->globais = $globais;
        self::$calculos = $calculos;
    }

    public function create_folha()
    {
        $data = [
            'titulo' => "Folha de Salário",
            'menu' => "Funcionários",
            'submenu' => "Folha de Salário",
            'tipo' => "form"
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
        //return $pdf->download('folha_salario_' . $mes_extenso . '-' . date('Y') . '.pdf');
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

    public static function irt($salario_base)
    {
        $tabela_irt = TabelaIRT::all();
        foreach ($tabela_irt as $t) {
            if ($t->inicio >= $salario_base && $t->ate <= $salario_base) {
                return "ola";
            } else {
                return "nao encontrou";
            }
        }
    }
}
