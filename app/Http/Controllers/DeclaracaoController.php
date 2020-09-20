<?php

namespace App\Http\Controllers;

use App\Declaracao;
use App\Funcionario;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $funcionario = Funcionario::where('id', $id)->first();
        if(!$funcionario){
            return back()->with(['error'=>"Nao encontrou funcionario"]);
        }
        $declaracao = Declaracao::where('id_funcionario', $id)->orderBy('id', 'desc')->get();
        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Declaração",
            'tipo' => "view",
            'getDeclaracao'=>$declaracao,
            'getFuncionario'=>$funcionario
        ];
        return view("declaracao.declaracao", $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $funcionario = Funcionario::where('id', $id)->first();
        if(!$funcionario){
            return back()->with(['error'=>"Noa encontrou funcionario"]);
        }

        $request->validate([
            'efeito'=>['required', 'string']
        ]);

        $data = [
            'id_funcionario'=>$id,
            'efeito'=>$request->efeito,
            'numero'=>null,
            'ano'=>date('Y')
        ];

        $declaracao = Declaracao::where('ano', $data['ano'])->get();
        $data['numero'] = $declaracao->count() + 1;

        if(Declaracao::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
