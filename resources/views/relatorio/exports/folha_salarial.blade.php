<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <div class="content">
        <div class="descricao" style="text-align: center;">
            Folha de Salario Referente ao Mes de: Agosto
        </div>
        <br/>
        <div class="imagem">
            <img src="" width="90px" height="80px" alt="" />
        </div>
<div class="tabela">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Genero</th>
                <th>Salario</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getFuncionarios as $funcionario)
             <tr>
                <td>
                    {{$funcionario->pessoa->nome}}
                </td>
                <td>
                    {{$funcionario->pessoa->genero}}
                </td>
                <td>
                    {{$funcionario->salario_base}}
                </td>
                <td>
                    {{$funcionario->cargo->cargo}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    
</body>
</html>



