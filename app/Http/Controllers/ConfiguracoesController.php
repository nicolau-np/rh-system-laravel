<?php

namespace App\Http\Controllers;

use App\Banco;
use App\ContaEmpresa;
use App\Empresa;
use Illuminate\Http\Request;

class ConfiguracoesController extends Controller
{
    public function empresa_list()
    {
        $empresa = Empresa::all();
        $data = [
            'titulo' => "Configuraçoes",
            'menu' => "Empresa",
            'submenu' => "Listar",
            'tipo' => "view",
            'getEmpresa' => $empresa
        ];

        return view("configuracoes.empresa.list", $data);
    }

    public function conta_list()
    {
        $contas = ContaEmpresa::all();
        $data = [
            'titulo' => "Configuraçoes",
            'menu' => "Contas",
            'submenu' => "Listar",
            'tipo' => "view",
            'getContas' => $contas
        ];

        return view("configuracoes.conta.list", $data);
    }

    public function empresa_new()
    {
        $data = [
            'titulo' => "Configuraçoes",
            'menu' => "Empresa",
            'submenu' => "Novo",
            'tipo' => "form"
        ];

        return view("configuracoes.empresa.new", $data);
    }
    public function conta_new()
    {
        $bancos = Banco::pluck('sigla', 'id');
        $empresa = Empresa::first()->pluck('nome', 'id');
        $data = [
            'titulo' => "Configuraçoes",
            'menu' => "Contas",
            'submenu' => "Novo",
            'tipo' => "form",
            'getEmpresa'=>$empresa,
            'getBancos'=>$bancos
        ];

        return view("configuracoes.conta.new", $data);
    }

    public function empresa_store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:12', 'max:255', 'unique:empresas,nome'],
            'nif' => ['required', 'Integer'],
            'data_fundacao' => ['required', 'date'],
            'telefone' => ['required', 'Integer'],
            'endereco' => ['required', 'string', 'min:12', 'max:255'],
            'logotipo' => ['required', 'mimes:png,jpg,jpeg'],
            'descricao_servico' => ['required', 'string']
        ]);
        $conta = Empresa::all();
        if ($conta->count() >= 1) {
            return back()->with(['error' => "Já Cadastrou a sua empresa"]);
        }

        $data = [
            'nome' => $request->nome,
            'nif' => $request->nif,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'site' => $request->site,
            'descricao_servico' => $request->descricao_servico,
            'data_aniversario' => $request->data_fundacao,
            'logotipo' => null
        ];

        if ($request->hasFile('logotipo') && $request->logotipo->isValid()) {
            $path_file = $request->logotipo->store('logotipo');
            $data['logotipo'] = $path_file;
        }

        if (Empresa::create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    public function conta_store(Request $request){
        $request->validate([
            'banco'=>['required', 'Integer'],
            'empresa'=>['required', 'Integer'],
            'conta'=>['required', 'string', 'min:7', 'max:25'],
            'iban'=>['required', 'string', 'min:20', 'max:255', 'unique:conta_empresas,iban']
        ]);

        $data = [
            'id_banco'=>$request->banco,
            'id_empresa'=>$request->empresa,
            'conta'=>$request->conta,
            'iban'=>$request->iban
        ];

        if(ContaEmpresa::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
        }
    }
}
