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
            {{Form::open(['class'=>'formCandidaturas', 'url'=>'/candidaturas/store', 'enctype'=>"multipart/form-data", 'method'=>'post'])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Formulário de Cadastro</h2>

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

                    <fieldset class="dados_pessoais">
                        <legend><i class="fa fa-user"></i> Dados do Candidato</legend>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                {{Form::label('nome', "Nome Completo")}} <span class="text-danger">*</span>
                                {{Form::text('nome', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nome Completo'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-2">
                                {{Form::label('genero', "Gênero")}} <span class="text-danger">*</span>
                                {{Form::select('genero',
                                                                ['M'=>'Masculino',
                                                                  'F'=>'Femenino'
                                                                ],null,
                                                                ['placeholder'=>'Gênero',
                                                                 'class'=>'form-control input-sm'
                                                                ]
                                                                )}}

                                @if($errors->has('genero'))
                                <span class="text-danger">{{$errors->first('genero')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('data_nascimento', "Data de Nascimento")}} <span class="text-danger">*</span>
                                {{Form::date('data_nascimento', null, ['class'=>'form-control input-sm'])}}
                                @if($errors->has('data_nascimento'))
                                <span class="text-danger">{{$errors->first('data_nascimento')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('tecnico', "Técnico")}} <span class="text-danger">*</span>
                                {{Form::select('tecnico',[
                                    'Nenhum'=>"Nenhum",
                                    'Técnico Básico'=>"Técnico Básico",
                                    'Técnico Médio'=>"Técnico Médio",
                                    'Bacharel'=>"Bacharel",
                                    'Técnico Superior'=>"Técnico Superior",
                                    'Mestrado'=>"Mestrado",
                                    'phD'=>"phD",
                                ],null,
                                ['placeholder'=>'Técnico',
                                 'class'=>'form-control input-sm'
                                ]
                                )}}
                                 @if($errors->has('tecnico'))
                                 <span class="text-danger">{{$errors->first('tecnico')}}</span>
                                 @endif
                            </div>

                        </div>
                        <div class="row form-group">

                            <div class="col-lg-3">
                                {{Form::label('curso', "Curso")}} <span class="text-danger">*</span>
                                {{Form::text('curso', null, ['class'=>'form-control input-sm', 'placeholder'=>'Curso'])}}
                               
                                @if($errors->has('curso'))
                                <span class="text-danger">{{$errors->first('curso')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('candidata', "Candidata-se Em")}} <span class="text-danger">*</span>
                                {{Form::text('candidata', null, ['class'=>'form-control input-sm', 'placeholder'=>'Candidata-se Em'])}}

                                @if($errors->has('candidata'))
                                <span class="text-danger">{{$errors->first('candidata')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('telefone', "Telefone")}} <span class="text-danger">*</span>
                                {{Form::number('telefone', null, ['class'=>'form-control input-sm', 'placeholder'=>'Telefone'])}}

                                @if($errors->has('telefone'))
                                <span class="text-danger">{{$errors->first('telefone')}}</span>
                                @endif
                            </div>
                          
                        </div>
                    
                    </fieldset>
                
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
    <!-- end: page -->
</section>

@endsection