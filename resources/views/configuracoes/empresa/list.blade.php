
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

                    <h2 class="panel-title">Listar</h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                            <form class="formSeach" action="#">
                                <div class="form-inline">
                                    <input type="search" class="form-control" placeholder="Search" aria-controls="datatable-default">&nbsp;
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-search"></i></a>&nbsp;
                                    <a href="/empresa/new" class="btn btn-success btn-sm" title="Novo"><i class="fa fa-plus"></i></a>&nbsp;
                                    
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
                                            <th>NIF</th>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Endereço</th>
                                            <th>Email</th>
                                            <th>Área</th>
                                            <th>Data Fundação</th>
                                            <th>Operações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($getEmpresa as $empresa)
                                        
                                        <tr>
                                            <td>{{$empresa->nif}}</td>
                                            <td>{{$empresa->nome}}</td>
                                            <td>{{$empresa->telefone}}</td>
                                            <td>{{$empresa->endereco}}</td>
                                            <td>{{$empresa->email}}</td>
                                            <td>{{$empresa->descricao_servico}}</td>
                                            <td>{{$empresa->data_aniversario}}</td>
                                           <td class="actions-hover actions-fade">
                                                <a href="/empresa/show/{{$empresa->id}}" title="Visualizar"><i class="fa fa-eye fa-2x"></i></a>&nbsp;
                                                <a href="/contas/link/{{$empresa->id}}" title="Editar"><i class="fa fa-pencil fa-2x"></i></a>&nbsp;
                                           </td>
                                        </tr>
                                       @endforeach
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
    <!-- end: page -->
</section>






@endsection