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
                                data: [{{number_format(11903,2,',','.')}}, 40200, 300020, 570000, 490000, 450000, 120000, 85140, 19990, 108811, 110020, 120000,]
                            }, {
                                name: 'I.R.T',
                                data: [11703, 20200, 300020, 570000, 490000, 450000, 120000, 85140, 19990, 108811, 80020, 90000,]
                            }, 
                            {
                                name: 'S.S',
                                data: [11903, 10200, 300220, 510000, 490000, 450100, 120000, 85140, 19990, 108811, 110020, 150000,]
                            },
                            {
                                name: 'Salário Líquido',
                                data: [11903, 10200, 300220, 510000, 490000, 450100, 120000, 85140, 19990, 108811, 110020, 150000,]
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