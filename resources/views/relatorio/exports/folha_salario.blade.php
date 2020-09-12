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
                margin:7;
            }
.rodape1{
    display: block;
    float: left;
}
            .rodape2{
                display: block;
                float: center;
                margin-left: 43%;
            }
            .rodape3{
                display: block;
                float: right;
            }
            .footer{
                margin-left: 26%;
                margin-right: 2%;
                float: center;
            }
            .tabela{
                display: block;
                float: left;
            }
            </style>
        </head>
   
<body>
      Folha de Remunerações <br />


        Nome da Empresa: nome_da_empresa<br />
        Mês de Referencia: {{$mesExtenso}}<br />
        NIF: nif_empresa<br /><br />




        <table border=2 style="font-family:'arial'; font-size:12px;">
           
                <tr>
                <td rowspan="2" width="25px">Nº</td>
                    <td rowspan="2">Beneficiário</td>
                    <td rowspan="2">Categoria Ocupacional</td>
                    <td rowspan="2">Salário Base</td>
                    <td rowspan="2">Dias de Trabalho</td>
                    <td rowspan="2">Salários P/ tempo de trabalho</td>
                    <td colspan="3">Remunerações Adicionais</td>
                    <td rowspan="2">Remuneração Íliquida</td>
                    <td colspan="4">Descontos Oficiais</td>
                   <!-- <td colspan="3" style="width: 2cm;">Subsídios</td>-->
                    <td rowspan="2">Líquido a Receber</td>
       </tr>

       <tr>
               
               <td>Horas Extras</td>
               <td>Prémios</td>
               <td>Outras</td>

                <td>I.R.T.</td>
                <td>S.S.</td>
                <td>Outros</td>
                <td>Total</td>

               <!-- <td style="width: 0.1cm;">Alimentação</td>
                <td style="width: 0.1cm;">Transporte</td>
                <td style="width: 0.1cm;">Comunicação</td>  -->

               
       </tr>
            
         


         
            <?php 
$total_base = 0;
$total_salario_tempo_trabalho = 0;
$total_irt = 0;
$total_inss = 0;
$total_geral_descontos = 0;
$total_liquido = 0;

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


        $total_base = ($total_base + $funcionarios->salario_base);
        $total_salario_tempo_trabalho = ($total_salario_tempo_trabalho + $salario_tempo_trab);
        $total_irt = $total_irt + $irt;
        $total_inss = $total_inss + $seg_social;
        $total_geral_descontos = $total_geral_descontos + $total_desconto;
        $total_liquido = $total_liquido + $liquido_receber;

               
?>

<tr>
<td>{{$cont}}</td>
<td>{{$funcionarios->pessoa->nome}}</td>
<td>{{$funcionarios->cargo->cargo}}</td>
<td>{{number_format($funcionarios->salario_base,2,',','.')}}</td>
<td>22</td>
<td>{{number_format($salario_tempo_trab,2,',','.')}}</td>
<td></td>
<td></td>
<td></td>
<td>{{number_format($salario_tempo_trab,2,',','.')}}</td>
<td>{{number_format($irt,2,',','.')}}</td>
<td>{{number_format($seg_social,2,',','.')}}</td>
<td></td>
<td>{{number_format($total_desconto,2,',','.')}}</td>
<!--<td></td>
<td></td>
<td></td>-->
<td>{{number_format($liquido_receber,2,',','.')}}</td>

</tr>
    <?php
        
     }
        }
}else{
    echo "nao tem sessao";
}?>
     <tr>
    <td colspan="3"><b style="font-size:15px;">Total</b></td>  
     <td>{{number_format($total_base,2,',','.')}}</td> 
     <td></td>
     <td>
         {{number_format($total_salario_tempo_trabalho,2,',','.')}}
     </td>
     <td></td>
     <td></td>
     <td></td>
     <td>
        {{number_format($total_salario_tempo_trabalho,2,',','.')}}
     </td>
     <td>
        {{number_format($total_irt,2,',','.')}}
     </td>
     <td>
{{number_format($total_inss,2,',','.')}}
     </td>
     <td></td>
<td>
    {{number_format($total_geral_descontos,2,',','.')}}
</td>
<td>
   <b>{{number_format($total_liquido,2,',','.')}}</b> 
</td>
    </tr>    
        </table>
        <br/>
        <br/>
        <div class="tabela">
           <table border="1">
               <tr>
                   <th colspan="2">
                    Total Pago (Iliquido )
                   </th>
               </tr>
               <tr>
                   <td>
                    8% Empresa
                   </td>
                  <td>

                  </td>
               </tr>
               <tr>
                <td>
                    3% dos Trabalhadores
                   </td>
                  <td>
                      
                  </td>
               </tr>
               <tr>
                <td>
                    11% Total a Depositar 
                   </td>
                   <td>
                      
                </td>
               </tr>
           </table>
        </div>
        <div class="footer">
            
            <div class="rodape2">
                Categoria: __________________________<br/><br/>
                Categoria: __________________________
            </div>
            <div class="rodape1">
                Elaborado Por: _______________________<br/><br/>
                Conferido Por: _______________________
            </div>
            <div class="rodape3">
                Data: {{date('d-m-Y')}} <br/> <br/>
                Data: {{date('d-m-Y')}}
            </div>
        </div>
        

        </body>
        </html>