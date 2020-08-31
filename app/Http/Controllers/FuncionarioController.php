<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cargo;
use App\ContaBancaria;
use App\Funcionario;
use App\Municipio;
use App\Pessoa;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $provincia;
    protected $municipio;
    protected $pessoa;
    protected $funcionario;
    protected $cargo;
    protected $banco;
    protected $conta_bancaria;

    public function __construct(Provincia $provincia, Municipio $municipio, Pessoa $pessoa, Funcionario $funcionario, Cargo $cargo, Banco $banco, ContaBancaria $conta_bancaria)
    {
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->pessoa = $pessoa;
        $this->funcionario = $funcionario;
        $this->cargo = $cargo;
        $this->banco = $banco;
        $this->conta_bancaria = $conta_bancaria;
    }

    public function index()
    {

        $funcionarios = Funcionario::paginate(4);


        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Listar",
            'tipo' => "view",
            'getFuncionarios' => $funcionarios
        ];

        return view('funcionario.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = $this->banco->pluck('sigla', 'id');
        $provincias = $this->provincia->orderBy('provincia', 'asc')->pluck('provincia', 'id');
        $cargos = $this->cargo->pluck('cargo', 'id');
        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Novo",
            'tipo' => "form",
            'getProvincia' => $provincias,
            'getCargo' => $cargos,
            'getBancos' => $bancos
        ];

        return view('funcionario.new', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => ['required', 'string', 'min:10', 'max:255', 'unique:pessoas,nome'],
                'genero' => ['required', 'string', 'max:2'],
                'data_nascimento' => ['required', 'date'],
                'estado_civil' => ['required', 'string', 'max:25'],
                'telefone' => ['required', 'Integer'],
                'provincia' => ['required', 'Integer'],
                'municipio' => ['required', 'Integer'],
                'bi' => ['required', 'string', 'min:14', 'max:14', 'unique:pessoas,bi'],
                'cargo' => ['required', 'Integer'],
                'salario_base' => ['required', 'Integer'],
                'data_ingresso' => ['required', 'date'],
                'banco' => ['required', 'Integer'],
                'conta' => ['required', 'string', 'min:9', 'max:20'],
                'iban' => ['required', 'string', 'min:9', 'max:50', 'unique:conta_bancarias,iban']
            ]
        );

        $data['pessoa'] = [
            'id_municipio' => $request->municipio,
            'nome' => $request->nome,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
            'estado_civil' => $request->estado_civil,
            'telefone' => $request->telefone,
            'bi' => $request->bi,
            'data_emissao' => $request->data_emissao,
            'local_emissao' => $request->local_emissao,
            'comuna' => $request->comuna,
            'foto' => null,
            'pai' => $request->pai,
            'mae' => $request->mae
        ];

        $data['funcionario'] = [
            'id_pessoa' => null,
            'id_cargo' => $request->cargo,
            'salario_base' => $request->salario_base,
            'data_entrada' => $request->data_ingresso
        ];

        $data['conta_bancaria'] = [
            'id_funcionario' => null,
            'id_banco' => $request->banco,
            'conta' => $request->conta,
            'iban' => $request->iban
        ];

        if ($request->hasFile('foto')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('foto')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('foto')->storeAs('public/fotosFuncionarios', $fileNameToStore);

            //  $filePath = $request->foto->store('fotosFuncionarios');
            $data['pessoa']['foto'] = $path;
        }

        $return = $this->pessoa->create($data['pessoa']);
        if ($return) {
            $data['funcionario']['id_pessoa'] = $return->id;
            $return2 = $this->funcionario->create($data['funcionario']);
            if ($return2) {
                $data['conta_bancaria']['id_funcionario'] = $return2->id;
                if ($this->conta_bancaria->create($data['conta_bancaria'])) {
                    return back()->with(['success' => 'Cadastro Feito com Sucesso']);
                }
            }
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
       $funcionario = $this->funcionario->where('id',$id)->first();

        if (!$funcionario) {
            return back()->with(['error' => 'Funcionário não Encontrado']);
        }

        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Visualizar",
            'tipo' => "view",
            'getFuncionario' => $funcionario
        ];

        return view('funcionario.show', $data);

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

    public function getMunicipio(Request $request)
    {

        $municipio = $this->municipio->where('id_provincia', $request->id_provincia)->pluck('municipio', 'id');
        $data = [
            'getMunicipio' => $municipio
        ];
        return view('ajax_load.municipio', $data);
    }

    public function formFalta($id){
        $funcionario = $this->funcionario->where('id',$id)->first();

        if (!$funcionario) {
            return back()->with(['error' => 'Funcionário não Encontrado']);
        }

        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Visualizar",
            'tipo' => "view",
            'getFuncionario' => $funcionario
        ];

        return view('funcionario.fault', $data);
    }
}
