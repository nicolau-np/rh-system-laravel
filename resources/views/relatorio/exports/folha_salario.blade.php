        <?php

        use App\Http\Controllers\RelatorioController;

        ?>

        Folha de Remunerações<br />


        Nome da Empresa:<br />
        Mês de Referencia: {{$mesExtenso}}<br />
        NIF:<br /><br />


        <table boder="1">
            <thead>
                <tr>
                <th>N.O.</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Salário Base</th>
                    <th>Nº de Dias Trab.</th>
                    <th>Nº de Faltas</th>
                    <th>Salar. P Tempo de Trab.</th>
                    <th>Remuneração Adicional</th>
                    <th>Seg. Social</th>
                    <th>IRT</th>
                </tr>
            </thead>


            <tbody>


                <?php
                $desconto_falta = 0;
                $salario_tempo_trab = 0;
                $cont = 0;
                $irt = null;
                foreach ($getFuncionarios as $funcionarios) {
                    $cont++;
                    $desconto_falta = 0;
                    $salario_tempo_trab = 0;
                    $irt = null;

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

                $irt = RelatorioController::irt($funcionarios->salario_base);
                ?>
                    <tr>
                        <td>{{$cont}}</td>
                        <td>{{$funcionarios->pessoa->nome}}</td>
                        <td>{{$funcionarios->cargo->cargo}}</td>
                        <td>{{number_format($funcionarios->salario_base, 2, ',', '.')}}</td>
                        <td>22</td>
                        <td>{{$falta->count()}}</td>
                        <td>{{number_format($salario_tempo_trab, 2, ',', '.')}}</td>
                    <td>0</td>
                    <td>{{number_format($seg_social, 2, ',', '.')}}</td>
                    <td>{{$irt}}</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>