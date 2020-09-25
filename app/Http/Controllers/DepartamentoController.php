<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Departamento;
use App\DepartamentoCategoria;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = Departamento::paginate(4);
        $data = [
            'titulo' => "Departamentos",
            'menu' => "Departamentos",
            'submenu' => "Listar",
            'tipo' => "view",
            'getDepartamentos' => $departamento
        ];
        return view("departamento.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'titulo' => "Departamentos",
            'menu' => "Departamentos",
            'submenu' => "Novo",
            'tipo' => "form"
        ];
        return view("departamento.new", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:9', 'max:255', 'unique:departamentos,nome']
            
        ]);

        $data = [
            'nome'=>$request->nome,
            'descricao'=>$request->descricao
        ];

        if (Departamento::create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
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
        $departamento = Departamento::find($id);
        if(!$departamento){
            return back()->with(['error'=>"Nao encontrou departamento"]);
        }

       $dep_cargo = DepartamentoCategoria::where('id_departamento', $id)->get();
        $cargos = Cargo::pluck('cargo', 'id');
        $data = [
            'titulo' => "Departamentos",
            'menu' => "Departamentos",
            'submenu' => "Cargo",
            'tipo' => "form",
            'getDepCargo'=>$dep_cargo,
            'getDepartamento'=>$departamento,
            'getCargos'=>$cargos
        ];
        return view("departamento.show", $data);
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

    public function store_depCargo(Request $request, $id){
       $departamento = Departamento::find($id);
        if(!$departamento){
            return back()->with(['error'=>"Nao encontrou departamento"]);
        }

        $request->validate([
            'nome'=>['required', 'string'],
            'cargo'=>['required', 'Integer']
        ]);

        $data = [
            'id_departamento'=>$id,
            'id_categoria'=>$request->cargo,
            'descricao'=>$request->descricao
        ];

        if(DepartamentoCategoria::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
    }
}
