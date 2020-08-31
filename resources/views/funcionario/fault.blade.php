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
            {{Form::open(['class'=>'formFuncionario', 'url'=>"/funcionarios/marcFalta/$getFuncionario->id", 'enctype'=>"multipart/form-data", 'method'=>'put'])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Marcação de Falta</h2>

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
                                {{Form::label('nome', "Nome Completo")}} <span class="text-danger">*</span>
                                {{Form::text('nome', $getFuncionario->pessoa->nome, ['class'=>'form-control input-sm', 'placeholder'=>'Nome Completo'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>


                            <div class="col-lg-3">
                                {{Form::label('tipo', "Tipo de Falta")}} <span class="text-danger">*</span>
                                {{Form::select('tipo',$getTipoFaltas, 1,
                                        ['placeholder'=>'Tipo de Falta',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('tipo'))
                                <span class="text-danger">{{$errors->first('tipo')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('data_falta', "Data de Falta")}} <span class="text-danger">*</span>
                                {{Form::date('data_falta', null, ['class'=>'form-control input-sm', 'placeholder'=>'Data de Falta'])}}
                                @if($errors->has('data_falta'))
                                <span class="text-danger">{{$errors->first('data_falta')}}</span>
                                @endif
                            </div>
                        </div>


                        <div class="row form-group">

                     
                            <div class="col-lg-5">
                                {{Form::label('motivo', "Motivo")}}

                                <textarea name="motivo" id="motivo" cols="5" rows="2" placeholder="Motivo" class="form-control"></textarea>
                                @if($errors->has('motivo'))
                                <span class="text-danger">{{$errors->first('motivo')}}</span>
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
                                            <th>Nome Completo</th>
                                            <th>Tipo</th>
                                            <th>Data</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getFaltas as $faltas)
                                        <tr>
                                            <td>{{$faltas->id}}</td>
                                            <td>{{$faltas->funcionario->pessoa->nome}}</td>
                                            <td>{{$faltas->tipo_falta->tipo}}</td>
                                            <td>{{$faltas->dia_semana}}-{{$faltas->mes}}-{{$faltas->ano}}</td>
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