<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function loginForm(){
        $data = [
            'titulo'=>"Iniciar Sessão Sistema RH",
            'menu'=>"Login",
            'submenu'=>"",
            'tipo'=>"login"
        ];
        return view('usuario.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'max:255']
            ],
            [
                'email.required' => 'Email Obrigatorio',
                'password.required' => 'Palavra-Passe Obrigatorio'
            ]
        );

        $credencials = $request->only('email', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        }else{
            return back()->with(['error'=>"Email ou Palavra-Passe Incorrectos"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginForm');
    }
}
