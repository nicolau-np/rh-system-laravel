
<style>
    .txt_folha{
        width: 75px;
        color:#0088cc;
    }
    .td_salario{
        color: green;
    }

    .td_nome{
        color: #0088cc;
    }
    table{
        font-size: 13px;
    }
</style>
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

        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Mês de {{$getMes}}</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <form class="formSeach" action="#">
                                <div class="form-inline">
                                    <input type="search" class="form-control" placeholder="Search" aria-controls="datatable-default">&nbsp;
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-search"></i></a>&nbsp;
                                <a href="/reports/folha_salario/{{$getidSalario}}" class="btn btn-primary btn-sm" title="Imprimir"><i class="fa fa-print"></i></a>&nbsp;
                                    
                                </div>
                            </form>

                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-none">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Funcionário</th>
                                            <th rowspan="2">Categoria</th>
                                            <th rowspan="2">Salário Base</th>
                                            <th colspan="3">Subcídios</th>
                                            <th colspan="3">Remunerações Adicionais</th>
                                            <th colspan="4">Descontos</th>
                                        </tr>
                                        <tr>
                                            <th class="thbo">Alimentação</th>
                                            <th class="thbo">Transporte</th>
                                            <th class="thbo">Comunicação</th>

                                            <th class="thbo">Horas Extras</th>
                                            <th class="thbo">Prêmios</th>
                                            <th class="thbo">Outros</th>

                                            <th class="thbo">I.R.T</th>
                                            <th class="thbo">S.S</th>
                                            <th class="thbo">Outros</th>
                                            <th class="thbo">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                       {{Form::open(['name'=>"formLancamento", 'class'=>"formLancamento", 'method'=>"post"])}}
                                        @foreach($getFolhaSalario as $folha_salarios)
                                       
                                        <tr>
                                            <td class="td_nome">{{$folha_salarios->funcionario->pessoa->nome}}</td>
                                            <td>{{$folha_salarios->funcionario->cargo->cargo}}</td>
                                            <td class="td_salario">{{number_format($folha_salarios->salario_base,2,',','.')}}</td>

                                            <td>{{Form::number('sub_alimentacao', $folha_salarios->sub_alimentacao, ['placeholder'=>"Akz", 'class'=>"sub_alimentacao txt_folha", 'data-coluna'=>"sub_alimentacao", 'data-id'=>$folha_salarios->id])}}</td>
                                            <td>{{Form::number('sub_transporte', $folha_salarios->sub_transporte, ['placeholder'=>"Akz", 'class'=>"sub_transporte txt_folha", 'data-coluna'=>"sub_transporte", 'data-id'=>$folha_salarios->id])}}</td>
                                            <td>{{Form::number('sub_comunicacao', $folha_salarios->sub_comunicacao, ['placeholder'=>"Akz", 'class'=>"sub_comunicacao txt_folha", 'data-coluna'=>"sub_comunicacao", 'data-id'=>$folha_salarios->id])}}</td>

                                        <td>{{Form::number('rem_horas_extras', $folha_salarios->rem_horas_extras, ['placeholder'=>"Akz", 'class'=>"rem_horas_extras txt_folha", 'data-coluna'=>"rem_horas_extras", 'data-id'=>$folha_salarios->id])}}</td>
                                        <td>{{Form::number('rem_premios', $folha_salarios->rem_premios, ['placeholder'=>"Akz", 'class'=>"rem_premios txt_folha", 'data-coluna'=>"rem_premios", 'data-id'=>$folha_salarios->id])}}</td>
                                        <td>{{Form::number('rem_outros', $folha_salarios->rem_outros, ['placeholder'=>"Akz", 'class'=>"rem_outros txt_folha", 'data-coluna'=>"rem_outros", 'data-id'=>$folha_salarios->id])}}</td>

                                        <td>{{$folha_salarios->irt}}</td>
                                        <td>{{$folha_salarios->ss}}</td>
                                        <td>{{$folha_salarios->outros}}</td>
                                        <td>{{$folha_salarios->total}}</td>

                                        </tr>
                                       @endforeach
                                       {{Form::close()}}
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6" style="text-align: right;">
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        $(document).ready(function(){

            //subcidios
            $('.sub_alimentacao').on("keypress", function (e) {
            if (e.which == 13) {
                var valor = $(this).val();
                var id_folhaSalarial = $(this).data('id');
                var coluna = $(this).data('coluna');
               if (valor != "" && valor >= 0) {
                    var pagina = "{{route('updateFolhaSalarial')}}";
                   var retorno = update_salario(pagina, id_folhaSalarial, coluna, valor);
                    if (retorno == true) {
                        $(this).css({'background': 'green', 'color': 'white', 'font-weight': 'bold'});
                    }
                } else {
                    $(this).css({'background': 'red', 'color': 'white', 'font-weight': 'bold'});
                }
              
            }
        });

        $('.sub_transporte').on("keypress", function (e) {
            if (e.which == 13) {
                var valor = $(this).val();
                var id_folhaSalarial = $(this).data('id');
                var coluna = $(this).data('coluna');
               if (valor != "" && valor >= 0) {
                    var pagina = "{{route('updateFolhaSalarial')}}";
                   var retorno = update_salario(pagina, id_folhaSalarial, coluna, valor);
                    if (retorno == true) {
                        $(this).css({'background': 'green', 'color': 'white', 'font-weight': 'bold'});
                    }
                } else {
                    $(this).css({'background': 'red', 'color': 'white', 'font-weight': 'bold'});
                }
              
            }
        });

        $('.sub_comunicacao').on("keypress", function (e) {
            if (e.which == 13) {
                var valor = $(this).val();
                var id_folhaSalarial = $(this).data('id');
                var coluna = $(this).data('coluna');
               if (valor != "" && valor >= 0) {
                    var pagina = "{{route('updateFolhaSalarial')}}";
                   var retorno = update_salario(pagina, id_folhaSalarial, coluna, valor);
                    if (retorno == true) {
                        $(this).css({'background': 'green', 'color': 'white', 'font-weight': 'bold'});
                    }
                } else {
                    $(this).css({'background': 'red', 'color': 'white', 'font-weight': 'bold'});
                }
              
            }
        });
        //fim

        //remuneracoes
        $('.rem_horas_extras').on("keypress", function (e) {
            if (e.which == 13) {
                var valor = $(this).val();
                var id_folhaSalarial = $(this).data('id');
                var coluna = $(this).data('coluna');
               if (valor != "" && valor >= 0) {
                    var pagina = "{{route('updateFolhaSalarial')}}";
                   var retorno = update_salario(pagina, id_folhaSalarial, coluna, valor);
                    if (retorno == true) {
                        $(this).css({'background': 'green', 'color': 'white', 'font-weight': 'bold'});
                    }
                } else {
                    $(this).css({'background': 'red', 'color': 'white', 'font-weight': 'bold'});
                }
              
            }
        });

        $('.rem_premios').on("keypress", function (e) {
            if (e.which == 13) {
                var valor = $(this).val();
                var id_folhaSalarial = $(this).data('id');
                var coluna = $(this).data('coluna');
               if (valor != "" && valor >= 0) {
                    var pagina = "{{route('updateFolhaSalarial')}}";
                   var retorno = update_salario(pagina, id_folhaSalarial, coluna, valor);
                    if (retorno == true) {
                        $(this).css({'background': 'green', 'color': 'white', 'font-weight': 'bold'});
                    }
                } else {
                    $(this).css({'background': 'red', 'color': 'white', 'font-weight': 'bold'});
                }
              
            }
        });


        $('.rem_outros').on("keypress", function (e) {
            if (e.which == 13) {
                var valor = $(this).val();
                var id_folhaSalarial = $(this).data('id');
                var coluna = $(this).data('coluna');
               if (valor != "" && valor >= 0) {
                    var pagina = "{{route('updateFolhaSalarial')}}";
                   var retorno = update_salario(pagina, id_folhaSalarial, coluna, valor);
                    if (retorno == true) {
                        $(this).css({'background': 'green', 'color': 'white', 'font-weight': 'bold'});
                    }
                } else {
                    $(this).css({'background': 'red', 'color': 'white', 'font-weight': 'bold'});
                }
              
            }
        });
        
        
        //fim

        function update_salario(pagina, id_folhaSalarial, coluna, valor) {
            $.ajax({
                method: "post",
                url: pagina,
                data: {
                    id_folhaSalarial: id_folhaSalarial,
                    coluna: coluna,
                    valor: valor
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                },
                success: function (result) {
                 console.log(result);
                }

            });
          return true;
        }
        });
    </script>
    <!-- end: page -->
</section>

@endsection