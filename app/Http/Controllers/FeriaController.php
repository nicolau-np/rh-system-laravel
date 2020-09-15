<?php

namespace App\Http\Controllers;

use App\Feria;
use App\Funcionario;
use Illuminate\Http\Request;

class FeriaController extends Controller
{
    public function index($id){
        $funcionario = Funcionario::where('id', $id)->first();
        if(!$funcionario){
            return back()->with(['error'=>"Nao encontrou funcionario"]);
        }
        $ferias = Feria::where('id_funcionario', $id)->orderBy('id', 'desc')->get();
        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Visualizar",
            'tipo' => "view",
            'getFerias'=>$ferias,
            'getFuncionario'=>$funcionario
        ];

        return view('ferias.feria', $data);
    }

    public function store(Request $request, $id){
        $funcionario = Funcionario::where('id', $id)->first();
        if(!$funcionario){
            return back()->with(['error'=>"Nao encontrou funcionario"]);
        }

        $request->validate(
[
    'nome'=>['required', 'string'],
    'data_entrada'=>['required', 'date'],
    'data_saida'=>['required', 'date'],
    
]
        );

        $data = [
            'id_funcionario'=>$id,
            'data_entrada'=>$request->data_entrada,
            'data_saida'=>$request->data_saida,
            'ano'=>date('Y'),
            'estado'=>"on"
        ];

        if(Feria::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
    }


}
