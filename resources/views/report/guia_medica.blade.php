<?php
$idade = 0;
$genero = null;
$numero = 0;

$string = explode('-',$getGuia_medica->funcionario->pessoa->data_nascimento);
$idade = date('Y') - $string[0];

if($getGuia_medica->numero<=9){
$numero = "0".$getGuia_medica->numero;
}else{
    $numero =$getGuia_medica->numero;
}

if($getGuia_medica->funcionario->pessoa->genero=="M"){
$genero = "Masculino";
}else{
    $genero = "Femenino";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Guia Médica {{$getGuia_medica->funcionario->pessoa->nome}}</title>
<style>
    @page{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        margin: 8%;
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
<h3>GUIA MÉDICA Nº {{$numero}}/{{$getGuia_medica->ano}}</h3>
</div>
<br/>
<div class="corpo">
    <p class="texto">
        Vai apresentar-se {{$getGuia_medica->local_apresentar}}.<br/>
        Nome do Beneficiário (a) {{$getGuia_medica->funcionario->pessoa->nome}} Situação: <br/>
    Cargo: {{$getGuia_medica->funcionario->cargo->cargo}}<br/>
    </p>
</div>
<br/>

<div class="titulo">
    <h3>ELEMENTOS REFERENTES AO BENEFICIÁRIO</h3>
</div>
<div class="corpo">
    <span class="tit">Filiação:</span> Pai: {{$getGuia_medica->funcionario->pessoa->pai}}<br/>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Mãe: {{$getGuia_medica->funcionario->pessoa->mae}}<br/>

   <span class="tit">Naturalidade:</span> Comuna: {{$getGuia_medica->funcionario->pessoa->comuna}} <br/>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   Município: {{$getGuia_medica->funcionario->pessoa->municipio->municipio}} <br/>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   Província: {{$getGuia_medica->funcionario->pessoa->municipio->provincia->provincia}}<br/>
    Idade {{$idade}} Anos
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Estado Civil {{$getGuia_medica->funcionario->pessoa->estado_civil}}  Sexo {{$genero}}<br/>
</div>
<br/>
<br/>
<br/>
<br/>
<div class="rodape">
    O DIRECTOR<br/>
    ---------------------------------------------<br/>
   Nicolau Ngala Pungue<br/>
</div>
<br/>
<br/>
<hr/>
<div class="titulo">
    <h3>PRESCRIÇÃO MÉDICA</h3>
</div>

<div class="prescricao">
    ____________________________________________________________________________________________________<br/><br/>
    ____________________________________________________________________________________________________<br/><br/>
    ____________________________________________________________________________________________________<br/><br/>
    ____________________________________________________________________________________________________<br/><br/>
    ____________________________________________________________________________________________________<br/><br/>
    ____________________________________________________________________________________________________<br/><br/>
    ____________________________________________________________________________________________________<br/><br/>
    _______/________/_________.
</div>
</body>
</html>
