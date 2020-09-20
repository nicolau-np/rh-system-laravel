<?php

namespace App\Http\Controllers;

use App\FolhaSalarial;
use App\Funcionario;
use App\Negocio\Globais;
use App\Salario;
use Illuminate\Http\Request;

class SalarioController extends Controller
{
    public static $globais;

    public function __construct(Globais $globais)
    {
        self::$globais = $globais;
    }

    public function index()
    {
        $salarios = Salario::orderBy('id', 'desc')->paginate(5);

        $data = [
            'titulo' => "Salários",
            'menu' => "Salários",
            'submenu' => "Listar",
            'tipo' => "view",
            'getSalarios' => $salarios
        ];
        return view('salario.list', $data);
    }

    public function create()
    {
        $funcionarios = Funcionario::all();

        $data = [
            'titulo' => "Salários",
            'menu' => "Salários",
            'submenu' => "Novo",
            'tipo' => "view",
            'getFuncionarios' => $funcionarios
        ];
        return view('salario.new', $data);
    }

    public function setPrioridade(Request $request)
    {
        $request->session()->push('prioridade', $request->prioridade);
    }
    public function remPrioridade(Request $request)
    {
        $request->session()->forget('prioridade');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prioridade' => ['required'],
            'mes' => ['required', 'Integer'],
            'ano' => ['required', 'Integer']
        ]);

        $data['salario'] = [
            'mes' => $request->mes,
            'ano' => $request->ano
        ];

        $data['folha_salarial'] = [
            'id_funcionario' => null,
            'id_salario' => null,
            'salario_base' => null
        ];

        if (Salario::where('mes', $data['salario']['mes'])->where('ano', $data['salario']['ano'])->first()) {
            return back()->with(['error' => "Já Cadastrou folha salarial para este mês"]);
        }

        $salario = Salario::create($data['salario']);
        if ($salario) {
            $data['folha_salarial']['id_salario'] = $salario->id;
            foreach ($request->session()->get('prioridade') as $prioridade) {
                $data['folha_salarial']['id_funcionario'] = $prioridade;
                $funcionario = Funcionario::where('id', $data['folha_salarial']['id_funcionario'])->first();
                $data['folha_salarial']['salario_base'] = $funcionario->salario_base;

                $folha_salarial = FolhaSalarial::create($data['folha_salarial']);
            }

            if ($folha_salarial) {
                return back()->with(['success' => "Cadastro feito com sucesso"]);
            }
        }
    }

    public static function converterMes($mes)
    {
        self::$globais->setMes($mes);

        return self::$globais->converterMes();
    }

    public function lancamento($id_salario)
    {
        $salario = Salario::where('id', $id_salario)->first();
        if (!$salario) {
            return back()->with(['error' => "Nao encontrou nenhum"]);
        }
        $folha_salarial = FolhaSalarial::where('id_salario', $id_salario)->get();

        $mes = self::converterMes($salario->mes);

        $data = [
            'titulo' => "Salários",
            'menu' => "Salários",
            'submenu' => "Processamentos de Salários",
            'tipo' => "view",
            'getFolhaSalario' => $folha_salarial,
            'getidSalario' => $id_salario,
            'getMes' => $mes
        ];
        return view('salario.lancamento', $data);
    }

    public function updateFolhaSalarial(Request $request)
    {
        $coluna = $request->coluna;
        $data = [
            "$coluna" => $request->valor
        ];

        $folha_salarial = FolhaSalarial::find($request->id_folhaSalarial)->update($data);
        return response()->json($data);
    }
}
