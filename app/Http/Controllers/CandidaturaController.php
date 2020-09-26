<?php

namespace App\Http\Controllers;

use App\Candidatura;
use Illuminate\Http\Request;

class CandidaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidaturas = Candidatura::paginate(4);
        $data = [
            'titulo' => "Candidaturas",
            'menu' => "Candidaturas",
            'submenu' => "Listar",
            'tipo' => "view",
            'getCandidaturas' => $candidaturas
        ];

        return view("candidatura.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'titulo' => "Candidaturas",
            'menu' => "Candidaturas",
            'submenu' => "Novo",
            'tipo' => "form"
        ];

        return view("candidatura.new", $data);
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
            'nome' => ['required', 'string', 'min:12', 'max:255'],
            'genero' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'curso' => ['required', 'string'],
            'candidata' => ['required', 'string'],
            'tecnico' => ['required', 'string'],
            'telefone' => ['required', 'Integer']

        ]);

        $data = [
            'nome' => $request->nome,
            'curso' => $request->curso,
            'ensino' => $request->tecnico,
            'candidata' => $request->candidata,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'genero' => $request->genero,
        ];


        if (Candidatura::create($data)) {
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
