@extends('template')

@section('content')

<section role="main" class="content-body">


    <header class="page-header">
        <h2>{{$titulo}}</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.html">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>{{$menu}}</span></li>
                <li><span>{{$submenu}}</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->

    <div class="row">
        <div class="col-md-12">
            {{Form::open(['class'=>'formDep_cargo', 'url'=>"/departamentos/store_depCargo/$getDepartamento->id", 'enctype'=>"multipart/form-data", 'method'=>'put'])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Cargos de Departamentos</h2>

                    <p class="panel-subtitle">
                        Deve preencher os campos obrigatórios. <span class="text-danger">*</span>
                    </p>
                </header>

                <div class="panel-body">
                    {{csrf_field()}}
                    @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif

  
                        <div class="row form-group">
                            <div class="col-lg-4">
                                {{Form::label('nome', "Nome do departamento")}} <span class="text-danger">*</span>
                                {{Form::text('nome', $getDepartamento->nome, ['class'=>'form-control input-sm', 'placeholder'=>'Nome do departamento'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-2">
                                {{Form::label('cargo', "Cargo")}} <span class="text-danger">*</span>
                                {{Form::select('cargo',$getCargos,null,
                                                                ['placeholder'=>'Cargo',
                                                                 'class'=>'form-control input-sm'
                                                                ]
                                                                )}}

                                @if($errors->has('cargo'))
                                <span class="text-danger">{{$errors->first('cargo')}}</span>
                                @endif
                            </div>
                            
                          
                        </div>

                </div>
                <footer class="panel-footer">
                    <div style="text-align:right">
                        {{Form::reset('Cancelar', ['class'=>'btn btn-danger'])}}
                        {{Form::submit('Salvar', ['class'=>'btn btn-primary'])}}
                    </div>

                </footer>
            </section>
            {{Form::close()}}
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
    <section class="panel">
              
                <div class="panel-body">
                   
                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-none">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Departamento</th>
                                            <th>Descrição</th>
                                            <th>Cargo</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getDepCargo as $dep_cargo)
                                        <tr>
                                            <td>{{$dep_cargo->id}}</td>
                                            <td>{{$dep_cargo->departamento->nome}}</td>
                                            <td>{{$dep_cargo->departamento->descricao}}</td>
                                            <td>{{$dep_cargo->cargo->cargo}}</td>
                                            <td class="actions-hover actions-fade">
                                                <a href="#"><i class="fa fa-trash-o fa-2x"></i></a>&nbsp;
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
    </div>
    </div>
    <!-- end: page -->
</section>

@endsection