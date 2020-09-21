@extends('template')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
    $(".prioridade").change(function(e){
        e.preventDefault();
        data = {
            prioridade: $(this).val()
        }
        //alert($(this).val());
$.ajax({
    url: "{{ route('setPrioridade') }}",
    type: "post",
    data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
    success: function(ret){
        alert(ret);
    }
});

    });

$(".remPrioridade").click(function(e){
e.preventDefault();
$.ajax({
    url: "{{ route('remPrioridade') }}",
    type: "post",
    data: null,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
    success: function(){
        alert("removidaTodas");
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
            {{Form::open(['class'=>'formFolha', 'url'=>'/salarios/store', 'files' => true])}}
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Criar Folha</h2>
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
                        <legend><i class="fa fa-th"></i> Dados</legend>
                        <div class="row form-group">
                            <div class="col-lg-3">
                                {{Form::label('mes', "Mês")}} <span class="text-danger">*</span>
                                {{Form::select('mes',
                                                                [
                                                                1=>'Janeiro',
                                                                  2=>'Fevereiro',
                                                                  3=>'Março',
                                                                  4=>'Abril',
                                                                  5=>'Maio',
                                                                  6=>'Junho',
                                                                  7=>'Julho',
                                                                  8=>'Agosto',
                                                                  9=>'Setembro',
                                                                  10=>'Outubro',
                                                                  11=>'Novembro',
                                                                  12=>'Dezembro'

                                                                ],null,
                                                                ['placeholder'=>'Mês',
                                                                 'class'=>'form-control input-sm'
                                                                ]
                                                                )}}

                                @if($errors->has('mes'))
                                <span class="text-danger">{{$errors->first('mes')}}</span>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('ano', "Ano Lectivo")}} <span class="text-danger">*</span>
                                {{Form::number('ano', null, ['class'=>'form-control input-sm', 'placeholder'=>'Ano Lectivo'])}}
                                @if($errors->has('ano'))
                                <span class="text-danger">{{$errors->first('ano')}}</span>
                                @endif
                            </div>

                            
                            <div class="mb-md hidden-lg hidden-xl"></div>
                            <div class="col-lg-2">
                                {{Form::label('dias_trabalho', "Dias de Trabalho")}} <span class="text-danger">*</span>
                                {{Form::number('dias_trabalho', null, ['class'=>'form-control input-sm', 'placeholder'=>'Dias de Trabalho'])}}
                                @if($errors->has('dias_trabalho'))
                                <span class="text-danger">{{$errors->first('dias_trabalho')}}</span>
                                @endif
                            </div>
                        </div>

<div class="row form-group">
<div class="col-lg-4">
{{Form::label('prioridade', "Prioridade")}} <span class="text-danger">*</span> &nbsp; &nbsp; <a href="{{route('remPrioridade')}}" class="remPrioridade"> rem </a><br/> 
@foreach($getFuncionarios as $funcionario)
<input type="checkbox" name="prioridade[]" value="{{$funcionario->id}}" class="prioridade" /> {{$funcionario->pessoa->nome}} - {{$funcionario->cargo->cargo}} <br/>
@endforeach
@if($errors->has('prioridade'))
                                <span class="text-danger">{{$errors->first('prioridade')}}</span>
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