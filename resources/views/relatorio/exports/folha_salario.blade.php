        <?php

        use App\Http\Controllers\RelatorioController;

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Folha de Salário</title>
            <style>
            @page{
                margin:0;
            }
            </style>
        </head>
   
<body>
        Folha de Remunerações<br />


        Nome da Empresa:<br />
        Mês de Referencia: {{$mesExtenso}}<br />
        NIF:<br /><br />




        <table border=2 style="font-family:'arial'; font-size:12px; table-layout: fixed;">
           
                <tr>
                <td rowspan="2" style="width: 25px;">Nº</td>
                    <td rowspan="2" style="width: 100px;">Beneficiário</td>
                    <td rowspan="2" style="width:25px;">Categoria Ocupacional</td>
                    <td rowspan="2" style="width:1.5cm;">Salário Base</td>
                    <td rowspan="2" style="width:0.2cm;">Dias de Trabalho</td>
                    <td rowspan="2" style="width:1cm;">Salários P/ tempo de trabalho</td>
                    <td colspan="3" style="width: 1cm;">Remunerações Adicionais</td>
                    <td rowspan="2" style="width:1cm;">Remuneração Íliquida</td>
                    <td colspan="4" style="width:1cm;">Descontos Oficiais</td>
                    <td colspan="3" style="width: 2cm;">Subsídios</td>
                    <td rowspan="2" style="width:1cm;">Líquido a Receber</td>
       </tr>

       <tr>
               
               <td style="width: 0.1cm;">Horas Extras</td>
               <td style="width: 0.1cm;">Prémios</td>
               <td style="width: 0.1cm;">Outras</td>

                <td style="width: 0.1cm;">I.R.T.</td>
                <td style="width: 0.1cm;">S.S.</td>
                <td style="width: 0.1cm;">Outros</td>
                <td style="width: 0.1cm;">Total</td>

                <td style="width: 0.1cm;">Alimentação</td>
                <td style="width: 0.1cm;">Transporte</td>
                <td style="width: 0.1cm;">Comunicação</td>  

               
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