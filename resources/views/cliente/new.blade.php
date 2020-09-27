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
            {{Form::open(['class'=>'formClientes', 'url'=>'/clientes/store', 'enctype'=>"multipart/form-data", 'method'=>'post'])}}
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
                        <legend><i class="fa fa-user"></i> Dados do Cliente</legend>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                {{Form::label('nome', "Nome")}} <span class="text-danger">*</span>
                                {{Form::text('nome', null, ['class'=>'form-control input-sm', 'placeholder'=>'Nome'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-2">
                                {{Form::label('tipo', "Tipo")}} <span class="text-danger">*</span>
                                {{Form::select('tipo',
                                                                ['Empresa'=>'Empresa',
                                                                  'Personal'=>'Personal'
                                                                ],null,
                                                                ['placeholder'=>'Tipo',
                                                                 'class'=>'form-control input-sm'
                                                                ]
                                                                )}}

                                @if($errors->has('tipo'))
                                <span class="text-danger">{{$errors->first('tipo')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('inicio_contrato', "Inicio do Contrato")}} <span class="text-danger">*</span>
                                {{Form::date('inicio_contrato', null, ['class'=>'form-control input-sm'])}}
                                @if($errors->has('inicio_contrato'))
                                <span class="text-danger">{{$errors->first('inicio_contrato')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-3">
                                {{Form::label('fim_contrato', "Fim do Contrato")}}
                                {{Form::date('fim_contrato', null, ['class'=>'form-control input-sm'])}}
                                @if($errors->has('fim_contrato'))
                                <span class="text-danger">{{$errors->first('fim_contrato')}}</span>
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
                            <div class="col-lg-2">
                                {{Form::label('tipo_servico', "Tipo de serviço")}} <span class="text-danger">*</span>
                                {{Form::text('tipo_servico', null, ['class'=>'form-control input-sm', 'placeholder'=>'Tipo de Serviço'])}}
                               
                                 @if($errors->has('tipo_servico'))
                                <span class="text-danger">{{$errors->first('tipo_servico')}}</span>
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