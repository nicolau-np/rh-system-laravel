<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data = [
            'titulo'=>"Sistema RH",
            'menu'=>"Home",
            'submenu'=>"",
            'tipo'=>"home"
        ];

        return view('home', $data);
    }
}
