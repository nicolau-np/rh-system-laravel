<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Folha de Salário</title>
    <style>
       /* @page{
            margin: 0;
        }*/
    </style>
</head>
<body>
    Folha de Remunerações <br />


    Nome da Empresa: nome_da_empresa<br />
    Mês de Referencia: <br />
    NIF: nif_empresa<br /><br />

            <table border=2 style="font-family:'arial'; font-size:12px;">
                <thead>
                    <tr>
                    <td rowspan="2" width="25px">Nº</td>
                        <td rowspan="2">Beneficiário</td>
                        <td rowspan="2">Categoria Ocupacional</td>
                        <td rowspan="2">Salário Base</td>
                        <td rowspan="2">Dias de Trabalho</td>
                        <td colspan="3">Subsídios</td>
                        <td rowspan="2">Remuneração Íliquida</td>
                        <td colspan="4">Descontos Oficiais</td>
                        <td rowspan="2">Líquido a Receber</td>
           </tr>
    
           <tr>
             
            <td>Alimentação</td>
            <td>Transporte</td>
            <td>Comunicação</td>

                    <td>I.R.T.</td>
                    <td>S.S.</td>
                    <td>Faltas</td>
                    <td>Total</td>
    
                  
            </tr>
        </thead>

        <tbody>
            <?php 
         $a = 0;
         $salario_liquido = 0;

         //variaveis de totais
        $total_salario_base =0;

        $total_sub_transporte =0;
        $total_sub_alimentacao =0;
        $total_sub_comunicacao =0;

        $total_salario_iliquido =0;

        $total_des_ss =0;
        $total_des_irt =0;
        $total_des_falta =0;
        $total_des_total =0;

        $total_salario_liquido =0;

         //fim totais

            foreach ($getFolha_salarial as $salario) {
                $a ++;
               $salario_liquido = ($salario->salario_iliquido - $salario->des_total);
            
               //calculos totais
               $total_salario_base = $total_salario_base + $salario->salario_base;

               $total_sub_alimentacao = $total_sub_alimentacao + $salario->sub_alimentacao;
               $total_sub_comunicacao = $total_sub_comunicacao + $salario->sub_comunicacao;
               $total_sub_transporte = $total_sub_transporte + $salario->sub_transporte;

               $total_salario_iliquido = $total_salario_iliquido + $salario->salario_iliquido;
               
               $total_des_ss = $total_des_ss + $salario->des_ss;
               $total_des_irt = $total_des_irt + $salario->des_irt;
               $total_des_falta = $total_des_falta + $salario->des_falta;
               $total_des_total = $total_des_total + $salario->des_total;
               
               $total_salario_liquido = $total_salario_liquido + $salario_liquido;
               //fim calculos
            
            ?>
            <tr>
                <td>{{$a}}</td>
            <td>{{$salario->funcionario->pessoa->nome}}</td>
            <td>{{$salario->funcionario->cargo->cargo}}</td>
            <td>{{number_format($salario->salario_base,2,',','.')}}</td>
            <td>{{$salario->salario->dias_trabalho}}</td>
                
            <td>{{number_format($salario->sub_alimentacao,2,',','.')}}</td>
            <td>{{number_format($salario->sub_transporte,2,',','.')}}</td>  
            <td>{{number_format($salario->sub_comunicacao,2,',','.')}}</td>

            <td>{{number_format($salario->salario_iliquido,2,',','.')}}</td>

            <td>{{number_format($salario->des_irt,2,',','.')}}</td>
            <td>{{number_format($salario->des_ss,2,',','.')}}</td>
            <td>{{number_format($salario->des_falta,2,',','.')}}</td>
            <td>{{number_format($salario->des_total,2,',','.')}}</td>

            <td>{{number_format($salario_liquido,2,',','.')}}</td>
            </tr>
        <?php } ?>
        <tr style="color:red;">
            <td colspan="3"><b>TOTAL</b></td>
            <td>{{number_format($total_salario_base,2,',','.')}}</td>
            <td></td>
        <td>{{number_format($total_sub_alimentacao,2,',','.')}}</td>
        <td>{{number_format($total_sub_transporte,2,',','.')}}</td>
        <td>{{number_format($total_sub_comunicacao,2,',','.')}}</td>

        <td>{{number_format($total_salario_iliquido,2,',','.')}}</td>

        <td>{{number_format($total_des_irt,2,',','.')}}</td>
        <td>{{number_format($total_des_ss,2,',','.')}}</td>
        <td>{{number_format($total_des_falta,2,',','.')}}</td>
        <td>{{number_format($total_des_total,2,',','.')}}</td>

        <td>{{number_format($total_salario_liquido,2,',','.')}}</td>
        </tr>
        </tbody>
    </table>
</body>
</html>