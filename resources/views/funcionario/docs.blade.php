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
            {{Form::open(['class'=>'formFuncionario', 'url'=>"/funcionarios/store_docs/$getFuncionario->id", 'enctype'=>"multipart/form-data", 'method'=>'put'])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Documentos</h2>

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
                                {{Form::label('tipo', "Tipo de Documento")}} <span class="text-danger">*</span>
                                {{Form::select('tipo',$getTipo_docs, null,
                                        ['placeholder'=>'Tipo de Documento',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('tipo'))
                                <span class="text-danger">{{$errors->first('tipo')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('documento', "Documento")}} <span class="text-danger">*</span>
                                {{Form::file('documento', null, ['class'=>'form-control input-sm', 'placeholder'=>'Data de Falta'])}}
                                @if($errors->has('documento'))
                                <span class="text-danger">{{$errors->first('documento')}}</span>
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
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($getDocs as $docs)
                                        <tr>
                                            <td>{{$docs->id}}</td>
                                            <td>{{$getFuncionario->pessoa->nome}}</td>
                                            <td>{{$docs->tipo_documento->tipo}}</td>
                                            <td class="actions-hover actions-fade">
                                            <a href="{{$docs->ficheiro}}"><i class="fa fa-eye fa-2x"></i></a>&nbsp;
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