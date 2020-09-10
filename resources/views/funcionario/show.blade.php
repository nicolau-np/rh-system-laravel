@extends('template')
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>{{$titulo}}</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/">
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
        <div class="col-md-4 col-lg-3">

            <section class="panel">
                <div class="panel-body">
                    <div class="thumb-info mb-md">
                        <img src="@if($getFuncionario->pessoa->foto == '')
                        {{asset('assets/images/novo/profile.png')}}
                        @else
                        {{asset($getFuncionario->pessoa->foto)}}
                        @endif" style="width:100%; height:16em; border-radius: 5px;" alt="{{$getFuncionario->pessoa->foto}}" />

                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$getFuncionario->pessoa->bi}}</span>
                            <span class="thumb-info-type">Nº B.I</span>
                        </div>
                    </div>

                    <div class="widget-toggle-expand mb-md">
                        <div class="widget-header">
                            <h6>Estado Perfil</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content-collapsed">
                            <div class="progress progress-xs light">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    60%
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-expanded">
                            <ul class="simple-todo-list">
                                <li>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Decl.</a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Cart. Rec.</a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <hr class="dotted short">

                    <h6 class="text-muted">Sobre</h6>
                    <p>
                        Ingressou em: {{date('d/m/Y', strtotime($getFuncionario->data_entrada))}} 
                    </p>
                    <div class="clearfix">
                        <a class="text-uppercase text-muted pull-right" href="#">(Ver Tudo)</a>
                    </div>

                    <hr class="dotted short">

                    <div class="social-icons-list">
                        <a rel="tooltip" data-placement="bottom" target="_blank" href="#" data-original-title="Facebook"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        <a rel="tooltip" data-placement="bottom" href="#" data-original-title="Twitter"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        <a rel="tooltip" data-placement="bottom" href="#" data-original-title="Linkedin"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
                    </div>

                </div>
            </section>


        </div>
        <div class="col-md-8 col-lg-6">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="active">
                        <a href="#overview" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Dados Pessoais</a>
                    </li>
                    <li class="">
                        <a href="#edit" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase"></i> Dados de Funcionário</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <h4 class="mb-md">Nome: <span style="color:cornflowerblue;">{{$getFuncionario->pessoa->nome}}</span></h4>
                        <h5 class="mb-md">Gênero: <span style="color:cornflowerblue;">{{$getFuncionario->pessoa->genero}}</h5>
                                <h5 class="mb-md">Data de Nascimento: <span style="color:cornflowerblue;">{{date('d/m/Y', strtotime($getFuncionario->pessoa->data_nascimento))}}</h5>
                                        <h5 class="mb-md">Província: <span style="color:cornflowerblue;">{{$getFuncionario->pessoa->municipio->provincia->provincia}}</h5>
                                                <h5 class="mb-md">Município: <span style="color:cornflowerblue;">{{$getFuncionario->pessoa->municipio->municipio}}</h5>
                                                        <h5 class="mb-md">Nº de Telefone: <span style="color:cornflowerblue;">{{$getFuncionario->pessoa->telefone}}</h5>
                                                                <h5 class="mb-md">Nº de Bilhete: <span style="color:cornflowerblue;">{{$getFuncionario->pessoa->bi}}</h5>
                                                                        <h5 class="mb-md">Data de Emissão: <span style="color:cornflowerblue;">@if($getFuncionario->pessoa->data_emissao == "") nenhum(a) @else {{date('d/m/Y', strtotime($getFuncionario->pessoa->data_emissao))}} @endif</h5>
                                                                                <h5 class="mb-md">Local de Emissão: <span style="color:cornflowerblue;">@if($getFuncionario->pessoa->local_emissao == "") nenhum(a) @else {{$getFuncionario->pessoa->local_emissao}} @endif</h5>
                                                                                        <h5 class="mb-md">Pai: <span style="color:cornflowerblue;">@if($getFuncionario->pessoa->pai == "") nenhum(a) @else {{$getFuncionario->pessoa->pai}} @endif</h5>
                                                                                                <h5 class="mb-md">Mãe: <span style="color:cornflowerblue;">@if($getFuncionario->pessoa->mae == "") nenhum(a) @else {{$getFuncionario->pessoa->mae}} @endif</h5>
                    </div>
                    <div id="edit" class="tab-pane">
                        <h4 class="mb-md">Categoria: <span style="color:cornflowerblue;">{{$getFuncionario->cargo->cargo}}</span></h4>   
                        <h5 class="mb-md">Salário Base: <span style="color:cornflowerblue;">Akz {{number_format($getFuncionario->salario_base, 2, ',', '.')}}</h5>
                            <h5 class="mb-md">Data de Ingresso: <span style="color:cornflowerblue;">{{date('d/m/Y', strtotime($getFuncionario->data_entrada))}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-3">

            <h4 class="mb-md">Estado</h4>
            <ul class="simple-card-list mb-xlg">
                <li class="danger">
                    <a href="/funcionarios/formFalta/{{ $getFuncionario->id }}" style="text-decoration: none; color:#fff;">
                    <h4>Marcar Falta</h4>
                    </a>
                </li>
                <li class="primary">
                    <?php
                    $string = explode("-", $getFuncionario->data_entrada);

                    $anos_trabalho = date('Y') - $string[0];
                    ?>
                    <h3>{{$getFuncionario->conta_bancaria->conta}}</h3>
                    <p>({{$getFuncionario->conta_bancaria->banco->sigla}}) - {{$getFuncionario->conta_bancaria->banco->banco}}.</p>
                </li>
                <li class="warning">
                    <h3>Akz {{number_format($getFuncionario->salario_base, 2, ',', '.')}}</h3>
                    <p>Salário Base.</p>
                </li>
                <li class="primary">
                    <h3>{{$anos_trabalho}}</h3>
                    <p>Anos de Trabalho.</p>
                </li>


            </ul>

            <h4 class="mb-md">Documentos Escaneados</h4>
            <ul class="simple-bullet-list mb-xlg">
                @if($getDocs->count()==0)
                Nenhum Documento encontrado
                @else
                @foreach ($getDocs as $docs)
                 <li class="green">
                    <span class="title">{{$docs->tipo_documento->tipo}}</span>
                 <span class="description truncate"><a href="{{$docs->ficheiro}}">Download</a></span>
                </li>
                @endforeach
            @endif
            </ul>


        </div>

    </div>
    <!-- end: page -->
</section>
@endsection