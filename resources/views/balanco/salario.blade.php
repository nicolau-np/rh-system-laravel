@php
use App\Http\Controllers\BalancoController; 
$meses = [1,2,3,4,5,6,7,8,9,10,11,12];  
$retorno = 0;
@endphp
@extends('template')

@section('content')

<style>

</style>

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

                    <h2 class="panel-title">Gráfico Demonstrativo de salários</h2>

                    <p class="panel-subtitle">
                        Dados para o ano de 2020
                    </p>
                </header>

                <div class="panel-body">
                    <div id="container"></div>



                    <script type="text/javascript">
                        Highcharts.chart('container', {
                            chart: {
                                type: 'areaspline'
                            },
                            title: {
                                text: 'Demonstração Gráfica'
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'left',
                                verticalAlign: 'top',
                                x: 150,
                                y: 100,
                                floating: true,
                                borderWidth: 1,
                                backgroundColor:
                                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
                            },
                            xAxis: {
                                categories: [
                                    'Jan',
                                    'Fev',
                                    'Mar',
                                    'Abr',
                                    'Mai',
                                    'Jun',
                                    'Jul',
                                    'Ago',
                                    'Set',
                                    'Out',
                                    'Nov',
                                    'Dez'
                                ],
                                plotBands: [{ // visualize the weekend
                                    from: 4.5,
                                    to: 6.5,
                                    color: 'rgba(68, 170, 213, .2)'
                                }]
                            },
                            yAxis: {
                                title: {
                                    text: 'Valores (Akz)'
                                }
                            },
                            tooltip: {
                                shared: true,
                                valueSuffix: ' Akz'
                            },
                            credits: {
                                enabled: false
                            },
                            plotOptions: {
                                areaspline: {
                                    fillOpacity: 0.5
                                }
                            },
                            series: [{
                                name: 'Salário ILíquido',
                                data: [
                                    <?php
                                    foreach($meses as $mes){
                                        $retorno = 0;
                                        $retorno = BalancoController::getGrafico($mes, "salario_iliquido");
                                        echo $retorno.","; 
                                    }
                                    ?>
                                ]
                            }, {
                                name: 'I.R.T',
                                data: [
                                    <?php
                                    foreach($meses as $mes){
                                        $retorno = 0;
                                        $retorno = BalancoController::getGrafico($mes, "irt");
                                        echo $retorno.","; 
                                    }
                                    ?>
                                ]
                            }, 
                            {
                                name: 'S.S',
                                data: [
                                    <?php
                                    foreach($meses as $mes){
                                        $retorno = 0;
                                        $retorno = BalancoController::getGrafico($mes, "ss");
                                        echo $retorno.","; 
                                    }
                                    ?>
                                ]
                            },
                            {
                                name: 'Salário Líquido',
                                data: [
                                    <?php
                                    foreach($meses as $mes){
                                        $retorno = 0;
                                        $retorno = BalancoController::getGrafico($mes, "salario_liquido");
                                        echo $retorno.","; 
                                    }
                                    ?>
                                ]
                            }]
                        });
                                </script>
             </div>
                <footer class="panel-footer">
                   

                </footer>
            </section>
            {{Form::close()}}
        </div>
    </div>
    <!-- end: page -->
</section>

@endsection