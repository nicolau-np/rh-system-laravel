@extends('template')

@section('content')

<script type="text/javascript">
    $(document).ready(function() {
        $('.provincia').change(function(e) {
            e.preventDefault();
            var data = {
                id_provincia: $(this).val()
            }

            $.ajax({
                type: "post",
                url: "{{route('getMunicipio')}}",
                data: data,
                dataType: 'html',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function() {

                },
                beforeSend: function() {

                },
                success: function(response) {
                    $('.muncipio').html(response);
                }
            });

        });
    });
</script>

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
            {{Form::open(['class'=>'formUsuarios', 'url'=>"/usuarios/store/{$getPessoa->id}", 'enctype'=>"multipart/form-data", 'method'=>'put'])}}
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
                        <legend><i class="fa fa-user"></i> Dados Usuário</legend>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                {{Form::label('nome', "Nome Completo")}} <span class="text-danger">*</span>
                                {{Form::text('nome', $getPessoa->nome, ['class'=>'form-control input-sm', 'placeholder'=>'Nome Completo'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-2">
                                {{Form::label('estado', "Estado")}} <span class="text-danger">*</span>
                                {{Form::select('estado',
                                                                ['on'=>'on',
                                                                  'off'=>'off'
                                                                ],null,
                                                                ['placeholder'=>'Estado',
                                                                 'class'=>'form-control input-sm'
                                                                ]
                                                                )}}

                                @if($errors->has('estado'))
                                <span class="text-danger">{{$errors->first('estado')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('email', "Email")}} <span class="text-danger">*</span>
                                {{Form::email('email', null, ['class'=>'form-control input-sm', 'placeholder'=>"Email"])}}
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('acesso', "Nível de Acesso")}} <span class="text-danger">*</span>
                                {{Form::select('acesso',
                                        ['user'=>'user',
                                          'admin'=>'admin'
                                        ],null,
                                        ['placeholder'=>'Nível de Acesso',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('acesso'))
                                <span class="text-danger">{{$errors->first('acesso')}}</span>
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