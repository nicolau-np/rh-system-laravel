<?php

namespace App\Http\Controllers;

use App\Banco;
use App\Cargo;
use App\ContaBancaria;
use App\DocsEscaneado;
use App\Exports\FolhaSalarial;
use App\Exports\IbansExport;
use App\Funcionario;
use App\Municipio;
use App\Pessoa;
use App\Provincia;
use App\TipoFalta;
use App\Falta;
use App\TipoDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;
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
    protected $tipo_falta;
    protected $falta;
    protected $excel;
    protected $tipo_docs;
    protected $docs;

    public function __construct(
        Provincia $provincia,
        Municipio $municipio,
        Pessoa $pessoa,
        Funcionario $funcionario,
        Cargo $cargo,
        Banco $banco,
        ContaBancaria $conta_bancaria,
        TipoFalta $tipo_falta,
        Falta $falta,
        Excel $excel,
        TipoDoc $tipo_docs,
        DocsEscaneado $docs
    ) {
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->pessoa = $pessoa;
        $this->funcionario = $funcionario;
        $this->cargo = $cargo;
        $this->banco = $banco;
        $this->conta_bancaria = $conta_bancaria;
        $this->tipo_falta = $tipo_falta;
        $this->falta = $falta;
        $this->excel = $excel;
        $this->docs = $docs;
        $this->tipo_docs = $tipo_docs;
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

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $path = $request->file('foto')->store('fotosFuncionarios');
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
        $funcionario = $this->funcionario->where('id', $id)->first();

        if (!$funcionario) {
            return back()->with(['error' => 'Funcionário não Encontrado']);
        }

        $docs = $this->docs->where('id_funcionario', $id)->get();

        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Visualizar",
            'tipo' => "view",
            'getFuncionario' => $funcionario,
            'getDocs'=>$docs
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
        $funcionario = $this->funcionario->where('id', $id)->first();
        if (!$funcionario) {
            return back()->with(['error' => "nao encontrou"]);
        }

        $bancos = $this->banco->pluck('sigla', 'id');
        $provincias = $this->provincia->orderBy('provincia', 'asc')->pluck('provincia', 'id');
        $cargos = $this->cargo->pluck('cargo', 'id');
        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Editar",
            'tipo' => "form",
            'getProvincia' => $provincias,
            'getCargo' => $cargos,
            'getBancos' => $bancos,
            'getFuncionario' => $funcionario
        ];

        return view('funcionario.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_funcionario, $id_pessoa)
    {
        $request->validate(
            [
                'nome' => ['required', 'string', 'min:10', 'max:255'],
                'genero' => ['required', 'string', 'max:2'],
                'data_nascimento' => ['required', 'date'],
                'estado_civil' => ['required', 'string', 'max:25'],
                'telefone' => ['required', 'Integer'],
                'provincia' => ['required', 'Integer'],
                'municipio' => ['required', 'Integer'],
                'bi' => ['required', 'string', 'min:14', 'max:14'],
                'cargo' => ['required', 'Integer'],
                'salario_base' => ['required', 'Integer'],
                'data_ingresso' => ['required', 'date'],
                'banco' => ['required', 'Integer'],
                'conta' => ['required', 'string', 'min:9', 'max:20'],
                'iban' => ['required', 'string', 'min:9', 'max:50']
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
            'foto' => $request->foto_antiga,
            'pai' => $request->pai,
            'mae' => $request->mae
        ];

        $data['funcionario'] = [
            'id_pessoa' => $id_pessoa,
            'id_cargo' => $request->cargo,
            'salario_base' => $request->salario_base,
            'data_entrada' => $request->data_ingresso
        ];

        $data['conta_bancaria'] = [
            'id_funcionario' => $id_funcionario,
            'id_banco' => $request->banco,
            'conta' => $request->conta,
            'iban' => $request->iban
        ];

        if ($request->hasFile('foto') && $request->foto->isValid()) {
            if ($request->foto_antiga != "" && file_exists($request->foto_antiga)) {
                unlink($request->foto_antiga);
            }
            $path = $request->file('foto')->store('fotosFuncionarios');
            $data['pessoa']['foto'] = $path;
        }

        $return = $this->pessoa->find($id_pessoa)->update($data['pessoa']);
        if ($return) {
            $return2 = $this->funcionario->find($id_funcionario)->update($data['funcionario']);
            if ($return2) {
                if ($this->conta_bancaria->where('id_funcionario', $id_funcionario)->update($data['conta_bancaria'])) {
                    return back()->with(['success' => 'Cadastro Feito com Sucesso']);
                }
            }
        }
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

    public function formFalta($id)
    {
        $funcionario = $this->funcionario->where('id', $id)->first();
        $tipo_falta = $this->tipo_falta->pluck('tipo', 'id');
        $faltas = $this->falta->where('id_funcionario', $id)->where('estado', 'on')->get();

        if (!$funcionario) {
            return back()->with(['error' => 'Funcionário não Encontrado']);
        }

        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Visualizar",
            'tipo' => "view",
            'getFuncionario' => $funcionario,
            'getTipoFaltas' => $tipo_falta,
            'getFaltas' => $faltas
        ];

        return view('funcionario.fault', $data);
    }

    public function marcFalta(Request $request, $id)
    {
        $request->validate(
            [
                'nome' => ['required', 'string'],
                'tipo' => ['required'],
                'data_falta' => ['required'],

            ]
        );
        $string = explode('-', $request->data_falta);

        $data = [
            'id_tipo' => $request->tipo,
            'id_funcionario' => $id,
            'motivo' => $request->motivo,
            'dia_semana' => $string[2],
            'mes' => $string[1],
            'ano' => $string[0],
            'estado' => "on"
        ];


        if ($this->falta->create($data)) {
            return back()->with(['success' => "Marcação Feita com Sucesso"]);
        }
    }

    public function export()
    {
        return $this->excel->download(new FolhaSalarial, 'folha_salarial.xlsx');
    }

    public function formDocumentos($id)
    {
        $funcionario = $this->funcionario->where('id', $id)->first();
        if (!$funcionario) {
            return back()->with(['error' => "Nao encontrou"]);
        }
        $tipo_docs = $this->tipo_docs->pluck('tipo', 'id');
        $docs = $this->docs->where('id_funcionario', $id)->get();
        $data = [
            'titulo' => "Funcionários",
            'menu' => "Funcionários",
            'submenu' => "Documentos",
            'tipo' => "view",
            'getFuncionario' => $funcionario,
            'getTipo_docs' => $tipo_docs,
            'getDocs' => $docs
        ];

        return view('funcionario.docs', $data);
    }

    public function store_docs(Request $request, $id)
    {
        $funcionario = $this->funcionario->where('id', $id)->first();
        if (!$funcionario) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $request->validate(
            [
                'nome' => ['required', 'string'],
                'tipo' => ['required', 'Integer'],
                'documento' => ['required', 'mimes:png,jpg,pdf,doc,docx']
            ]
        );
        $data = [
            'id_tipo' => $request->tipo,
            'id_funcionario' => $id,
            'ficheiro' => null
        ];
        $docs = $this->docs->where('id_tipo', $data['id_tipo'])
            ->where('id_funcionario', $id)->first();
        if ($docs) {
            return back()->with(['error' => "Já Fez o cadastro deste Documento"]);
        }

        if ($request->hasFile('documento') && $request->documento->isValid()) {
            $path_file = $request->documento->store('docsEscaneados');
            $data['ficheiro'] = $path_file;
        }

        if ($this->docs->create($data)) {
            return back()->with(['success' => "Feito com sucesso"]);
        }
    }

    public function download($ficheiro){
            return response()->download(public_path("docsEscaneados/".$ficheiro));
    }

    public function ibans(){
        return $this->excel->download(new IbansExport, 'contas_bancarias.xlsx');
    }

}
