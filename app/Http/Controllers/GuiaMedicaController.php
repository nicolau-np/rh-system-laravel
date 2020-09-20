<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\GuiaMedica;
use Illuminate\Http\Request;

class GuiaMedicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $funcionario = Funcionario::where('id', $id)->first();
        if (!$funcionario) {
            return back()->with(['error' => "Nao encontrou funcionario"]);
        }
        $guia_medica = GuiaMedica::where('id_funcionario', $id)->orderBy('id', 'desc')->get();
        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Guia Médica",
            'tipo' => "view",
            'getGuiaMedica' => $guia_medica,
            'getFuncionario' => $funcionario
        ];
        return view('guia_medica.guia_medica', $data);
    }

    public function store(Request $request, $id)
    {
        $funcionario = Funcionario::where('id', $id)->first();
        if (!$funcionario) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $request->validate([
            'nome' => ['required', 'string'],
            'local_apresentar' => ['required', 'string']
        ]);

        $data = [
            'id_funcionario' => $id,
            'local_apresentar' => $request->local_apresentar,
            'data_repouso' => $request->data_inicio,
            'data_retoma' => $request->data_saida,
            'prescricao_medica' => $request->prescricao_medica,
            'ano' => date('Y'),
            'numero'=>null,
            'estado'=>"on"
        ];

        $guia_medica = GuiaMedica::where('ano', $data['ano'])->get();

        $data['numero'] = $guia_medica->count() + 1;
        if (GuiaMedica::create($data)) {
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
