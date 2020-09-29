<?php

namespace App\Http\Controllers;

use App\Banco;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function banco_list(){
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

    public function banco_new(){

    }

    public function banco_store(Request $request){

    }
}
