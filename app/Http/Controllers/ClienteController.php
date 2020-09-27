<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Faturacao;
use App\Provincia;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(4);
        $data = [
            'titulo'=>"Clientes",
            'menu'=>"Clientes",
            'submenu'=>"Listar",
            'tipo'=>"view",
            'getClientes'=>$clientes
        ];

        return view("cliente.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provincias = Provincia::pluck('provincia', 'id');
        $data = [
            'titulo'=>"Clientes",
            'menu'=>"Clientes",
            'submenu'=>"Novo",
            'tipo'=>"form",
            'getProvincia'=>$provincias
        ];

        return view("cliente.new", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome'=>['required', 'string', 'min:12', 'max:255'],
                'tipo'=>['required', 'string'],
                'provincia'=>['required', 'Integer'],
                'municipio'=>['required', 'Integer'],
                'inicio_contrato'=>['required', 'date'],
                'tipo_servico'=>['required', 'string']
            ]
        );

        $data = [
            'id_municipio'=>$request->municipio,
            'nome'=>$request->nome,
            'inicio_contrato'=>$request->inicio_contrato,
            'fim_contrato'=>$request->fim_contrato,
            'tipo'=>$request->tipo,
            'tipo_servico'=>$request->tipo_servico
        ];

        if(Cliente::create($data)){
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

    public function faturacao($id){
        $cliente = Cliente::find($id);
        if(!$cliente){
            return back()->with(['error'=>"Nao encontrou"]);
        }
        $faturacao = Faturacao::where('id_cliente', $id)->get();
        $data = [
            'titulo'=>"Clientes",
            'menu'=>"Clientes",
            'submenu'=>"Novo",
            'tipo'=>"form",
            'getCliente'=>$cliente,
            'getFaturacao'=>$faturacao
        ];

        return view("cliente.faturacao", $data);
    }

    public function store_faturacao(Request $request, $id){
        $cliente = Cliente::find($id);
        if(!$cliente){
            return back()->with(['error'=>"Nao encontrou"]);
        }

        $request->validate([
            'nome'=>['required', 'string'],
            'data_faturacao'=>['required', 'date'],
            'quantidade'=>['required', 'Integer'],
            'tipo'=>['required', 'string'],
            'pc_unitario'=>['required', 'Integer']
            ]);

            $string_mes = explode("-", $request->data_faturacao);
            $total = $request->quantidade * $request->pc_unitario;

            $data = [
                'id_cliente'=>$id,
                'mes'=>$string_mes[1],
                'ano'=>$string_mes[0],
                'quantidate'=>$request->quantidade,
                'pc_unitario'=>$request->pc_unitario,
                'total'=>$total,
                'tipo'=>$request->tipo,
                'data_faturacao'=>$request->data_faturacao,
                'descricao'=>$request->descricao
            ];

            if(Faturacao::create($data)){
                return back()->with(['success'=>"Feito com sucesso"]);
            }
            
    }
}
