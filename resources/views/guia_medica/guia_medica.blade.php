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
            {{Form::open(['class'=>'formFuncionario', 'url'=>"/guia_medica/store/$getFuncionario->id", 'enctype'=>"multipart/form-data", 'method'=>'put'])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Guia Médica de Funcionários</h2>

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
                                {{Form::label('data_inicio', "Data de Início")}}
                                {{Form::date('data_inicio', null, ['placeholder'=>'Data de Início','class'=>'form-control input-sm'])}}

                                @if($errors->has('data_inicio'))
                                <span class="text-danger">{{$errors->first('data_inicio')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('data_saida', "Data de Fim")}}
                                {{Form::date('data_saida', null, ['placeholder'=>'Data de Fim','class'=>'form-control input-sm'])}}

                                @if($errors->has('data_saida'))
                                <span class="text-danger">{{$errors->first('data_saida')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                {{Form::label('local_apresentar', "Local à Apresentar")}} <span class="text-danger">*</span>
                                {{ Form::textarea('local_apresentar', null, ['placeholder'=>"Local à Apresentar", 'class'=>"form-control input-sm", 'cols'=>"50", 'rows'=>"3"]) }}
                                @if($errors->has('local_apresentar'))
                                <span class="text-danger">{{$errors->first('local_apresentar')}}</span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                {{Form::label('prescricao_medica', "Prescrição Médica")}}
                                {{ Form::textarea('prescricao_medica', null, ['placeholder'=>"Prescrição Médica", 'class'=>"form-control input-sm", 'cols'=>"50", 'rows'=>"3"]) }}
                                @if($errors->has('prescricao_medica'))
                                <span class="text-danger">{{$errors->first('prescricao_medica')}}</span>
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
                                            <th>Local apresentar</th>
                                            <th>Data Iníco</th>
                                            <th>Data Apresentação</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getGuiaMedica as $guia_medica)
                                        <tr>
                                            <td>{{$guia_medica->numero}}</td>
                                            <td>{{$getFuncionario->pessoa->nome}}</td>
                                            <td>{{$guia_medica->local_apresentar}}</td>
                                            <td>{{$guia_medica->data_repouso}}</td>
                                            <td>{{$guia_medica->data_retoma}}</td>
                                            <td class="actions-hover actions-fade">
                                            <a href="/reports/guia_medica/{{$guia_medica->id}}" title="Imprimir"><i class="fa fa-file-o fa-2x"></i></a>&nbsp;
                                                <a href="#" title="Eliminar"><i class="fa fa-trash-o fa-2x"></i></a>
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