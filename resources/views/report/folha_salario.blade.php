<?php 
use App\Http\Controllers\ReportController;
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
            margin: 0;
        }
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
                        <td rowspan="2">Salários P/ tempo de trabalho</td>
                        <td colspan="3">Remunerações Adicionais</td>
                        <td rowspan="2">Remuneração Íliquida</td>
                        <td colspan="4">Descontos Oficiais</td>
                      <td colspan="3">Subsídios</td>
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
    
                    <td>Alimentação</td>
                    <td>Transporte</td>
                    <td>Comunicação</td>
            </tr>
        </thead>

        <tbody>
            <?php 
            $ss = 0;
            $a = 0;
            $salario_iliquido = 0;
            foreach ($getFolha_salarial as $salario) {
                $a ++;
                $salario_iliquido = $salario->salario_base;
                $ss = $salario_iliquido*0.03;

                $irt = ReportController::irt($salario_iliquido, $ss);
            ?>
            <tr>
                <td>{{$a}}</td>
            <td>{{$salario->funcionario->pessoa->nome}}</td>
            <td>{{$salario->funcionario->cargo->cargo}}</td>
            <td>{{number_format($salario->salario_base,2,',','.')}}</td>
                <td>22</td>
                <td></td>
                
            <td>{{number_format($salario->rem_horas_extras,2,',','.')}}</td>
                <td>{{number_format($salario->rem_premios,2,',','.')}}</td>
                <td>{{number_format($salario->rem_outros,2,',','.')}}</td>

            <td>{{number_format($salario_iliquido,2,',','.')}}</td>

            <td>{{number_format($irt,2,',','.')}}</td>
            <td>{{number_format($ss,2,',','.')}}</td>
                <td></td>
                <td></td>

            <td>{{number_format($salario->sub_alimentacao,2,',','.')}}</td>
            <td>{{number_format($salario->sub_transporte,2,',','.')}}</td>  
            <td>{{number_format($salario->sub_comunicacao,2,',','.')}}</td>

                <td></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>