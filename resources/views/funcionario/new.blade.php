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
            {{Form::open(['class'=>'formFuncionario', 'url'=>'/funcionarios/store', 'enctype'=>"multipart/form-data", 'method'=>'post'])}}
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
                        <legend><i class="fa fa-user"></i> Dados Pessoais</legend>
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
                                {{Form::label('estado_civil', "Estado Civíl")}} <span class="text-danger">*</span>
                                {{Form::select('estado_civil',
                                        ['solteiro(a)'=>'solteiro(a)',
                                          'casado(a)'=>'casado(a)'
                                        ],null,
                                        ['placeholder'=>'Estado Civíl',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('estado_civil'))
                                <span class="text-danger">{{$errors->first('estado_civil')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-lg-2">
                                {{Form::label('provincia', "Província")}} <span class="text-danger">*</span>
                                {{Form::select('provincia',
                                        $getProvincia,null,
                                        ['placeholder'=>'Província',
                                         'class'=>'form-control input-sm provincia'
                                        ]
                                        )}}

                                @if($errors->has('provincia'))
                                <span class="text-danger">{{$errors->first('provincia')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2 muncipio">
                                {{Form::label('municipio', "Município")}} <span class="text-danger">*</span>
                                {{Form::select('municipio',
                                        [],null,
                                        ['placeholder'=>'Município',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('municipio'))
                                <span class="text-danger">{{$errors->first('municipio')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('bi', "Nº de Bilhete")}} <span class="text-danger">*</span>
                                {{Form::text('bi', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nº de Bilhete'])}}
                                @if($errors->has('bi'))
                                <span class="text-danger">{{$errors->first('bi')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('data_emissao', "Data de Emissão")}}
                                {{Form::date('data_emissao', null, ['class'=>'form-control input-sm', 'placeholder'=>'Data de Emissão'])}}
                                @if($errors->has('data_emissao'))
                                <span class="text-danger">{{$errors->first('data_emissao')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('local_emissao', "Local de Emissão")}}
                                {{Form::text('local_emissao', null, ['class'=>'form-control input-sm', 'placeholder'=>'Local de Emissão'])}}
                                @if($errors->has('local_emissao'))
                                <span class="text-danger">{{$errors->first('local_emissao')}}</span>
                                @endif
                            </div>


                        </div>
                        <div class="row form-group">

                            <div class="col-lg-3">
                                {{Form::label('telefone', "Telefone")}} <span class="text-danger">*</span>
                                {{Form::number('telefone', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nº de Telefone'])}}
                                @if($errors->has('telefone'))
                                <span class="text-danger">{{$errors->first('telefone')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-4">
                                {{Form::label('foto', "Foto")}}
                                {{Form::file('foto',null, ['class'=>'form-control input-sm'])}}

                                @if($errors->has('foto'))
                                <span class="text-danger">{{$errors->first('foto')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('comuna', "Comuna")}}
                                {{Form::text('comuna',null, ['placeholder'=>'Comuna','class'=>'form-control input-sm'])}}

                                @if($errors->has('comuna'))
                                <span class="text-danger">{{$errors->first('comuna')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('pai', "Nome do Pai")}}
                                {{Form::text('pai', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nome do Pai'])}}
                                @if($errors->has('pai'))
                                <span class="text-danger">{{$errors->first('pai')}}</span>
                                @endif
                            </div>



                        </div>
                        <div class="row group">
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('mae', "Nome da Mãe")}}
                                {{Form::text('mae', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nome da Mãe'])}}
                                @if($errors->has('mae'))
                                <span class="text-danger">{{$errors->first('mae')}}</span>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <br />
                    <fieldset class="dados_profissionais">
                        <legend><i class="fa fa-briefcase"></i> Dados Funcionário</legend>
                        <div class="row group">
                            <div class="col-lg-3">
                                {{Form::label('cargo', "Cargo")}} <span class="text-danger">*</span>
                                {{Form::select('cargo',
                                        $getCargo,null,
                                        ['placeholder'=>'Cargo',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('cargo'))
                                <span class="text-danger">{{$errors->first('cargo')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-2">
                                {{Form::label('salario_base', "Salário Base")}} <span class="text-danger">*</span>
                                {{Form::number('salario_base', null, ['placeholder'=>'Salário Base', 'class'=>'form-control input-sm'])}}

                                @if($errors->has('salario_base'))
                                <span class="text-danger">{{$errors->first('salario_base')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-3">
                                {{Form::label('data_ingresso', "Data de Ingresso")}} <span class="text-danger">*</span>
                                {{Form::date('data_ingresso', null, ['class'=>'form-control input-sm'])}}

                                @if($errors->has('data_ingresso'))
                                <span class="text-danger">{{$errors->first('data_ingresso')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('banco', "Banco")}} <span class="text-danger">*</span>
                                {{Form::select('banco',
                                        $getBancos,null,
                                        ['placeholder'=>'Banco',
                                         'class'=>'form-control input-sm'
                                        ]
                                        )}}

                                @if($errors->has('banco'))
                                <span class="text-danger">{{$errors->first('banco')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>

                        </div>

                        <div class="row group">
                            <div class="col-lg-3">
                                {{Form::label('conta', "Nº da Conta")}} <span class="text-danger">*</span>
                                {{Form::text('conta', null, ['placeholder'=>'Nº da Conta', 'class'=>'form-control input-sm'])}}

                                @if($errors->has('conta'))
                                <span class="text-danger">{{$errors->first('conta')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-5">
                                {{Form::label('iban', "Nº de IBAN")}} <span class="text-danger">*</span>
                                {{Form::text('iban', null, ['placeholder'=>'Nº de IBAN', 'class'=>'form-control input-sm'])}}

                                @if($errors->has('iban'))
                                <span class="text-danger">{{$errors->first('iban')}}</span>
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