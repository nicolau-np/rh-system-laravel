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
     @page{
           font-family: Arial, Helvetica, sans-serif;
           font-size: 12px;
           margin-left: 2%;
           margin-right: 2%;
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

            .cabecalho{
 font-size:14px;
}

.referente{
    display: block;
    float: center;
    margin-left: 35%;
}

.tb{
    width: 23%;
}

.tdtb0{
    text-align: center;
}

.tdsub{
    font-weight: bold;
}
    </style>
</head>
<body>

    <div class="cabecalho">

        <span class="referente">
            <?php
            $mes = 0;
            if($getMes2<=9){
                $mes = "0".$getMes2;
            }else{
                $mes = $getMes2;
            }
            ?>
        <h4>Remuneração Referente ao Mês <span style="text-decoration: underline;">{{$mes}}</span> /{{$getAno}}</h4>
        </span>


    </div> <br /><br /><br /><br />


            <table border=1 cellspacing=0 cellpadding=2 bordercolor="#000">
                <thead>
                    <tr>
                    <td rowspan="2" width="25px" class="tdtb0">Nº</td>
                        <td rowspan="2" class="tdtb0">Beneficiário</td>
                        <td rowspan="2" class="tdtb0">Categoria Ocupacional</td>
                        <td rowspan="2" class="tdtb0">Salário Base</td>
                        <td rowspan="2" class="tdtb0">Dias de Trabalho</td>
                        <td colspan="3" class="tdtb0">Subsídios</td>
                        <td rowspan="2" class="tdtb0">Remuneração Iliquida</td>
                        <td colspan="4" class="tdtb0">Descontos Oficiais</td>
                        <td rowspan="2" class="tdtb0">Liquido a Receber</td>
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
        <tr>
            <td colspan="3"><b>TOTAL</b></td>
            <td class="tdsub">{{number_format($total_salario_base,2,',','.')}}</td>
            <td></td>
        <td  class="tdsub">{{number_format($total_sub_alimentacao,2,',','.')}}</td>
        <td  class="tdsub">{{number_format($total_sub_transporte,2,',','.')}}</td>
        <td  class="tdsub">{{number_format($total_sub_comunicacao,2,',','.')}}</td>

        <td  class="tdsub">{{number_format($total_salario_iliquido,2,',','.')}}</td>

        <td  class="tdsub">{{number_format($total_des_irt,2,',','.')}}</td>
        <td  class="tdsub">{{number_format($total_des_ss,2,',','.')}}</td>
        <td  class="tdsub">{{number_format($total_des_falta,2,',','.')}}</td>
        <td  class="tdsub">{{number_format($total_des_total,2,',','.')}}</td>

        <td  class="tdsub">{{number_format($total_salario_liquido,2,',','.')}}</td>
        </tr>
        </tbody>
    </table>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="tabela">
       <table border=1 cellspacing=0 cellpadding=2 bordercolor="#000" class="tb">

           <tr>
               <td>S. Iliquido</td>
               <td  class="tdsub">{{number_format($total_salario_base,2,',','.')}}</td>
           </tr>
           <tr>
               <td>S.S. 3%</td>
              <td  class="tdsub">{{number_format($total_des_ss,2,',','.')}}</td>
           </tr>
           <tr>
           <td>Empresa {{$getEntidade_patronal}}%</td>
             <td  class="tdsub">
                 <?php
                    $inns8 = $total_salario_iliquido*($getEntidade_patronal/100);
                 ?>
                 {{number_format($inns8,2,',','.')}}
             </td>
           </tr>
           <tr>
            <td>I.R.T.</td>
             <td  class="tdsub">{{number_format($total_des_irt,2,',','.')}}</td>
           </tr>
           <tr>
            <td>S. Liquido</td>
             <td  class="tdsub">{{number_format($total_salario_liquido,2,',','.')}}</td>
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
