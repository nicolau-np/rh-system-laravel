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
                        <img src="@if($getPerfil->pessoa->foto == '')
                        {{asset('assets/images/novo/profile.png')}}
                        @else
                        {{asset($getPerfil->pessoa->foto)}}
                        @endif" style="width:100%; height:16em; border-radius: 5px;" alt="{{$getPerfil->pessoa->foto}}" />

                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{$getPerfil->acesso}}</span>
                            <span class="thumb-info-type">Acesso</span>
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
                              

                            </ul>
                        </div>
                    </div>

                    <hr class="dotted short">

                    <h6 class="text-muted">Sobre</h6>
                    <p>
                        Email: {{$getPerfil->email}} 
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
        <div class="col-md-12 col-lg-9">

            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="active">
                        <a href="#overview" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Editar Perfil</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                {{Form::open(['class'=>'formFuncionario', 'url'=>'/usuarios/update_perfil', 'enctype'=>"multipart/form-data", 'method'=>'post'])}}
                                <section class="panel">
                                  
                    
                                    <div class="panel-body">
                                        {{csrf_field()}}
                                        @if(session('error'))
                                        <div class="alert alert-danger">{{session('error')}}</div>
                                        @endif
                    
                                        @if(session('success'))
                                        <div class="alert alert-success">{{session('success')}}</div>
                                        @endif
                    
                                     
                                            <div class="row form-group">
                                                <div class="col-lg-6">
                                                    {{Form::label('palavra_passe', "Palavra Passe Actual")}} <span class="text-danger">*</span>
                                                    {{Form::password('palavra_passe', null, ['class'=>'form-control input-sm', 'placeholder'=>'Palavra Passe Actual'])}}
                                                    @if($errors->has('palavra_passe'))
                                                    <span class="text-danger">{{$errors->first('palavra_passe')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-lg-6">
                                                    {{Form::label('palavra_nova', "Palavra Passe Nova")}} <span class="text-danger">*</span>
                                                    {{Form::password('palavra_nova', null, ['class'=>'form-control input-sm', 'placeholder'=>'Palavra Passe Nova'])}}
                                                    @if($errors->has('palavra_nova'))
                                                    <span class="text-danger">{{$errors->first('palavra_nova')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                         
                                            <div class="row form-group">
                                                <div class="col-lg-6">
                                                    {{Form::label('palavra_confirm', "Confirmação da Palavra Passe")}} <span class="text-danger">*</span>
                                                    {{Form::password('palavra_confirm', null, ['class'=>'form-control input-sm', 'placeholder'=>'Confirmação'])}}
                                                    @if($errors->has('palavra_confirm'))
                                                    <span class="text-danger">{{$errors->first('palavra_confirm')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row form-group">

                                                <div class="col-lg-4">
                                                    {{Form::label('foto', "Foto")}}
                                                    {{Form::file('foto',null, ['class'=>'form-control input-sm'])}}
                    
                                                    @if($errors->has('foto'))
                                                    <span class="text-danger">{{$errors->first('foto')}}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-md hidden-lg hidden-xl"></div>
                                              
                                                <div class="mb-md hidden-lg hidden-xl"></div>
                                          
                    
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
                    </div>
                 </div>
            </div>
        </div>
    

    </div>
    <!-- end: page -->
</section>
@endsection