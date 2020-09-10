<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .top{
            display: block;
            float: center;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
               <td colspan="4"><b>Contas Bancárias de Funcionários</b></td> 
            </tr>
          <tr>
        <th>Nome</th>
        <th>Categoria</th> 
        <th>Banco</th>
        <th>IBAN</th>     
        </tr>  
        </thead>
        <tbody>
            @foreach ($getFuncionarios as $funcionarios)
            <tr>
            <td>{{$funcionarios->pessoa->nome}}</td>
            <td>{{$funcionarios->cargo->cargo}}</td>
            <td>{{$funcionarios->conta_bancaria->banco->banco}} ({{$funcionarios->conta_bancaria->banco->sigla}})</td>
            <td>{{$funcionarios->conta_bancaria->iban}}</td> 
            </tr>
           @endforeach
        </tbody>
        
    </table>
</body>
</html>
