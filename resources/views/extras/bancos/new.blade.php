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
            {{Form::open(['class'=>'formBancos', 'url'=>'/bancos/store', 'enctype'=>"multipart/form-data", 'method'=>'post'])}}
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
                                {{Form::label('banco', "Banco")}} <span class="text-danger">*</span>
                                {{Form::text('banco', null, ['class'=>'form-control input-sm', 'placeholder'=>"Banco"])}}
                                @if($errors->has('banco'))
                                <span class="text-danger">{{$errors->first('banco')}}</span>
                                @endif
                               </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('sigla', "Sígla")}} <span class="text-danger">*</span>
                                {{Form::text('sigla', null, ['class'=>'form-control input-sm', 'placeholder'=>"Sígla"])}}
                                @if($errors->has('sigla'))
                                <span class="text-danger">{{$errors->first('sigla')}}</span>
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