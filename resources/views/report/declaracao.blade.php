<?php
$numero = 0;
if($getDeclaracao->numero<=9){
$numero = "0".$getDeclaracao->numero;
}else{
    $numero =$getDeclaracao->numero;
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Declaração {{$getDeclaracao->funcionario->pessoa->nome}}</title>
<style>
    @page{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        margin-top: 8%;
    }

.titulo{
    text-align: center;
}
.corpo p{
    text-align: justify;
}
.nome{
    color: red;
    font-weight: bold;
}
.subrodape{
text-align: center;
}
.rodape{
    text-align: center;
}
</style>
</head>
<body>


<div class="titulo">
<h3>DECLARAÇÃO Nº {{$numero}}/{{$getDeclaracao->ano}}</h3>
</div>
<br/>
<br/>
<br/>
<div class="corpo">
    <p class="texto">
        Para os devidos efeitos declara-se que <span class="nome">{{$getDeclaracao->funcionario->pessoa->nome}}</span> com o cargo de {{$getDeclaracao->funcionario->cargo->cargo}}, auferindo o salário mensal de {{number_format($getDeclaracao->funcionario->salario_base,2,',','.')}}
        é funcionário(a) desta Instituição.
        Esta Declaração destina-se exclusivamente a efeito de {{$getDeclaracao->efeito}}.
        Por ser verdade e me ter sido solicitado mandei passar a
        referida declaração que vai por mim assinada e autenticada com o
        carimbo a óleo em uso nesta instituição escolar.
    </p>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="subrodape">
Lubango aos {{date('d')}} de {{$getMes}} de {{date('Y')}}
</div>
<br/>
<br/>
<br/>
<div class="rodape">
    O DIRECTOR<br/>
    ---------------------------------------------<br/>
   Nicolau Ngala Pungue<br/>
</div>
</body>
</html>
