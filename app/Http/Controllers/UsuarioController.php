<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    protected $usuarios;
    protected $pessoa;

    public function __construct(User $usuarios, Pessoa $pessoa)
    {
        $this->usuarios = $usuarios;
        $this->pessoa = $pessoa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $usuarios = $this->usuarios->where('acesso', '!=', 'admin')->paginate(2);
        $data = [
            'titulo' => "Usuários",
            'menu' => "Usuários",
            'submenu' => "Listar",
            'tipo' => "view",
            'getUsuarios' => $usuarios
        ];
        return view('usuario.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_pessoa)
    {
        $pessoa = Pessoa::find($id_pessoa);
        if(!$pessoa){
            return back()->with(['error'=>"Nao encontrou pessoa"]);
        }

        $data = [
            'titulo' => "Usuários",
            'menu' => "Usuários",
            'submenu' => "Novo",
            'tipo' => "form",
            'getPessoa'=>$pessoa
        ];
        return view('usuario.new', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       echo "hello";
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

    public function loginForm()
    {
        $data = [
            'titulo' => "Iniciar Sessão Sistema RH",
            'menu' => "Login",
            'submenu' => "",
            'tipo' => "login"
        ];
        return view('usuario.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'max:255']
            ]
        );

        $credencials = $request->only('email', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('home');
        } else {
            return back()->with(['error' => "Email ou Palavra-Passe Incorrectos"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginForm');
    }

    public function perfil()
    {
        $id = Auth::user()->pessoa->id;
        $perfil = $this->usuarios->where('id_pessoa', $id)->first();
        $data = [
            'titulo' => "Meu Perfil",
            'menu' => "Usuários",
            'submenu' => "Meu Perfil",
            'tipo' => "view",
            'getPerfil' => $perfil
        ];
        return view('usuario.perfil', $data);
    }

    public function update_perfil(Request $request)
    {
        $foto_antiga = Auth::user()->pessoa->foto;
        $id = Auth::user()->pessoa->id;
        if ($request->palavra_passe != "") {
            $request->validate(
                [
                    'palavra_passe' => ['required', 'string', 'max:255'],
                    'palavra_nova' => ['required', 'string', 'max:255'],
                    'palavra_confirm' => ['required', 'string', 'max:255']
                ]
            );
        }

        $data['pessoa'] = [
            'foto' => null
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $request->validate(
                [
                    'foto' => ['required', "mimes:png,jpg,jpeg"]
                ]
            );
            if ($foto_antiga != "" && file_exists($foto_antiga)) {
                unlink($foto_antiga);
            }
            $path = $request->file('foto')->store('fotosFuncionarios');
            $data['pessoa']['foto'] = $path;
        }

        if ($this->pessoa->find(Auth::user()->pessoa->id)->update($data['pessoa'])) {
            return back()->with(['success' => "Feito Com sucesso"]);
        }
    }
}
