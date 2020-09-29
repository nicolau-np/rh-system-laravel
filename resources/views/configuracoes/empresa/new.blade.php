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
            {{Form::open(['class'=>'formEmpresa', 'url'=>'/empresa/store', 'enctype'=>"multipart/form-data", 'method'=>'post'])}}
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
                        <legend><i class="fa fa-table"></i> Dados</legend>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                {{Form::label('nome', "Nome da Empresa")}} <span class="text-danger">*</span>
                                {{Form::text('nome', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nome da Empresa'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-2">
                                {{Form::label('nif', "NIF")}} <span class="text-danger">*</span>
                                {{Form::number('nif', null, ['class'=>'form-control input-sm', 'placeholder'=>'NIF'])}}
                                @if($errors->has('nif'))
                                <span class="text-danger">{{$errors->first('nif')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('data_fundacao', "Data de Fundação")}} <span class="text-danger">*</span>
                                {{Form::date('data_fundacao', null, ['class'=>'form-control input-sm'])}}
                                @if($errors->has('data_fundacao'))
                                <span class="text-danger">{{$errors->first('data_fundacao')}}</span>
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
                        <div class="row form-group">

                            <div class="col-lg-2">
                                {{Form::label('endereco', "Endereço")}} <span class="text-danger">*</span>
                                {{Form::text('endereco', null, ['class'=>'form-control input-sm', 'placeholder'=>'Endereço'])}}
                                @if($errors->has('endereco'))
                                <span class="text-danger">{{$errors->first('endereco')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                                <div class="col-lg-2">
                                    {{Form::label('email', "Email")}}
                                    {{Form::text('email', null, ['class'=>'form-control input-sm', 'placeholder'=>'Email'])}}
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
          
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('site', "Site")}}
                                {{Form::text('site', null, ['class'=>'form-control input-sm', 'placeholder'=>'Site'])}}
                                @if($errors->has('site'))
                                <span class="text-danger">{{$errors->first('site')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('logotipo', "IMG Logotipo")}} <span class="text-danger">*</span>
                                {{Form::file('logotipo',null, ['class'=>'form-control input-sm'])}}
                                @if($errors->has('logotipo'))
                                <span class="text-danger">{{$errors->first('logotipo')}}</span>
                                @endif
                            </div>

                          </div>
                        <div class="row form-group">

                            <div class="col-lg-5">
                                {{Form::label('descricao_servico', "Descrição do Serviço à prestar")}} <span class="text-danger">*</span>
                                {{Form::textarea('descricao_servico', null, ['cols'=>"30", 'rows'=>"4", 'class'=>"form-control input-sm"])}}
                                @if($errors->has('descricao_servico'))
                                <span class="text-danger">{{$errors->first('descricao_servico')}}</span>
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