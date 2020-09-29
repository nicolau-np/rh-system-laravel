<?php

namespace App\Http\Controllers;

use App\Banco;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function banco_list()
    {
        $bancos = Banco::paginate(5);
        $data = [
            'titulo' => "Extras",
            'menu' => "Bancos",
            'submenu' => "Listar",
            'tipo' => "view",
            'getBancos' => $bancos
        ];

        return view("extras.bancos.list", $data);
    }

    public function banco_new()
    {
        $data = [
            'titulo' => "Extras",
            'menu' => "Bancos",
            'submenu' => "Novo",
            'tipo' => "form"
        ];

        return view("extras.bancos.new", $data);
    }

    public function banco_store(Request $request)
    {
        $request->validate([
            'banco' => ['required', 'string', 'min:12', 'max:255', 'unique:bancos,banco'],
            'sigla' => ['required', 'string', 'min:2', 'max:20', 'unique:bancos,sigla']
        ]);
        $data = [
            'banco' => $request->banco,
            'sigla' => $request->sigla
        ];
        if (Banco::create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }
}
