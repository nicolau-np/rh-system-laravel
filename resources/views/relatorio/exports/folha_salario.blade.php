        <?php

        use App\Http\Controllers\RelatorioController;

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
<body style="margin:0px">
        Folha de Remunerações<br />


        Nome da Empresa:<br />
        Mês de Referencia: {{$mesExtenso}}<br />
        NIF:<br /><br />




        <table border=2 style="font-family:'arial'; font-size:12px;">
           
                <tr>
                <td rowspan="2">Nº</td>
                    <td rowspan="2">Beneficiário</td>
                    <td rowspan="2" style="width:23;">Categoria Ocupacional</td>
                    <td rowspan="2" style="width:23;">Salário Base</td>
                    <td rowspan="2" style="width:23;">Dias de Trabalho</td>
                    <td rowspan="2" style="width:23;">Salários P/ tempo de trabalho</td>
                    <td colspan="3">Remunerações Adicionais</td>
                    <td rowspan="2" style="width:23;">Remuneração Íliquida</td>
                    <td colspan="4">Descontos Oficiais</td>
                    <td colspan="3">Subsídios</td>
                    <td rowspan="2" style="width:23;">Líquido a Receber</td>
       </tr>

       <tr>
               
               <td>Horas Extras</td>
               <td>Prémios</td>
               <td>Outras</td>

                <td>I.R.T.</td>
                <td>S.S.</td>
                <td>Outros</td>
                <td>Total</td>

                <td>Alimentação</td>
                <td>Transporte</td>
                <td>Comunicação</td>  

               
       </tr>
            
         


         
            <?php 
            $desconto_falta = 0;
            $salario_tempo_trab = 0;
            $cont = 0;
            $irt = null;
            $liquido_receber = 0;
            $total_desconto = 0;
            if(session()->has('prioridade')){

    foreach(session('prioridade') as $value){
        $resposta = RelatorioController::getFuncionarioPriorit($value);
        foreach($resposta as $funcionarios){    
            $cont++;
            $desconto_falta = 0;
            $salario_tempo_trab = 0;
            $irt = null;
            $liquido_receber = 0;
            $total_desconto = 0;

            $falta = RelatorioController::ver_falta($funcionarios->id, $ano, $mes);
            if ($falta->count() != 0) {
                foreach ($falta as $f) {
                    $desconto_falta = $desconto_falta + $f->tipo_falta->desconto;
                }
                
            }else{
                $desconto_falta = 0;
            }
         $salario_tempo_trab = $funcionarios->salario_base - $desconto_falta;   
        
        $seg_social = RelatorioController::seg_social($funcionarios->salario_base);
        
        $irt = RelatorioController::irt($funcionarios->salario_base, $seg_social);
        $liquido_receber = $funcionarios->salario_base - $irt - $seg_social;
        $total_desconto = $irt+$seg_social;
        
?>

<tr>
<td>{{$cont}}</td>
<td>{{$funcionarios->pessoa->nome}}</td>
<td>{{$funcionarios->cargo->cargo}}</td>
<td>{{number_format($funcionarios->salario_base,2,',','.')}}</td>
<td>24</td>
<td>{{number_format($salario_tempo_trab,2,',','.')}}</td>
<td></td>
<td></td>
<td></td>
<td>{{number_format($salario_tempo_trab,2,',','.')}}</td>
<td>{{number_format($irt,2,',','.')}}</td>
<td>{{number_format($seg_social,2,',','.')}}</td>
<td></td>
<td>{{number_format($total_desconto,2,',','.')}}</td>
<td></td>
<td></td>
<td></td>
<td>{{number_format($liquido_receber,2,',','.')}}</td>

</tr>
    <?php
        
     }
        }
}else{
    echo "nao tem sessao";
}?>
         
        </table>
        </body>
        </html>