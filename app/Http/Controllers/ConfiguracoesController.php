<?php

namespace App\Http\Controllers;

use App\ContaEmpresa;
use App\Empresa;
use Illuminate\Http\Request;

class ConfiguracoesController extends Controller
{
    public function empresa_list(){
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

    public function conta_list(){
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
    
    public function empresa_new(){

    }
    public function conta_new(){

    }
}
