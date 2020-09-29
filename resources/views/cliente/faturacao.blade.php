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
            {{Form::open(['class'=>'formFaturacao', 'url'=>"/clientes/store_faturacao/$getCliente->id", 'enctype'=>"multipart/form-data", 'method'=>'put'])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Faturação</h2>

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

  
                        <div class="row form-group">
                            <div class="col-lg-3">
                                {{Form::label('nome', "Nome Completo")}} <span class="text-danger">*</span>
                                {{Form::text('nome', $getCliente->nome, ['class'=>'form-control input-sm', 'placeholder'=>'Nome Completo'])}}
                                @if($errors->has('nome'))
                                <span class="text-danger">{{$errors->first('nome')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>


                            <div class="col-lg-3">
                                {{Form::label('data_faturacao', "Data de Faturação")}} <span class="text-danger">*</span>
                                {{Form::date('data_faturacao', null, ['placeholder'=>'Data de Faturação','class'=>'form-control input-sm'])}}

                                @if($errors->has('data_faturacao'))
                                <span class="text-danger">{{$errors->first('data_faturacao')}}</span>
                                @endif
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>
                            
                            <div class="col-lg-2">
                                {{Form::label('quantidade', "Quantidade")}} <span class="text-danger">*</span>
                                {{Form::number('quantidade', null, ['placeholder'=>'Quantidade','class'=>'form-control input-sm'])}}

                                @if($errors->has('quantidade'))
                                <span class="text-danger">{{$errors->first('quantidade')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('pc_unitario', "P. Unitário")}} <span class="text-danger">*</span>
                                {{Form::number('pc_unitario', null, ['placeholder'=>'P. Unitário"','class'=>'form-control input-sm'])}}

                                @if($errors->has('pc_unitario'))
                                <span class="text-danger">{{$errors->first('pc_unitario')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('tipo', "Tipo")}} <span class="text-danger">*</span>
                                {{Form::select('tipo',
                                                                [
                                                                'Manuteção Correctiva'=>'Manuteção Correctiva',
                                                                'Manuteção Preventiva'=>'Manuteção Preventiva',
                                                                'Reparação'=>'Reparação',
                                                                  'Montagem'=>'Montagem'
                                                                ],null,
                                                                ['placeholder'=>'Tipo',
                                                                 'class'=>'form-control input-sm'
                                                                ]
                                                                )}}
                                @if($errors->has('tipo'))
                                <span class="text-danger">{{$errors->first('tipo')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-4">
                                {{Form::label('Descrição', "Descrição")}}
                                <textarea name="descricao" id="descricao" cols="10" rows="5" class="form-control input-sm" placeholder="Descrição"></textarea>
                            </div>
                           
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

    <div class="row">
    <div class="col-md-12">
    <section class="panel">
              
                <div class="panel-body">
                   
                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-none">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                           <th>Qt.</th>
                                            <th>P. Unitário</th>
                                            <th>Total</th>
                                            <th>Tipo</th>
                                            <th>Descrição</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getFaturacao as $faturacao)
                                        <tr>
                                        <td>{{$faturacao->id}}</td>
                                        <td>{{date('d/m/Y', strtotime($faturacao->data_faturacao))}}</td>
                                        <td>{{$faturacao->quantidate}}</td>
                                        <td>{{number_format($faturacao->pc_unitario,2,',','.')}}</td>
                                        <td>{{number_format($faturacao->total,2,',','.')}}</td>
                                        <td>{{$faturacao->tipo}}</td>
                                        <td>{{$faturacao->descricao}}</td>
                                        <td>
                                            <a href="#"><i class="fa fa-trash-o fa-2x" title="Eliminar"></i></a>&nbsp;
                                        </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
    </div>
    </div>
    <!-- end: page -->
</section>

@endsection