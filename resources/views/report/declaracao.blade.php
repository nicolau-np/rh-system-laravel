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
    
<div class="cabecalho">
    <span class="logo">
        <img src="data:image/png;base64,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" style="width:200px; height:105px;" alt="">
        </span> 
</div>
<br/>
<br/>
<div class="titulo">
    <?php 
$numero = 0;
if($getDeclaracao->numero<=9){
$numero = "0".$getDeclaracao->numero;
}else{
    $numero =$getDeclaracao->numero;
}
    ?>
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
Lubango aos {{date('d')}} de {{$getDeclaracao->mes}} de {{$getDeclaracao->ano}}
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