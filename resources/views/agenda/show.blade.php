<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table table-hover" style="margin-bottom: inherit">
        <tbody>
            <tr>
                <td>{{ $dados['nome'] }}</td>
                <td>{{ $dados['telefone'] }}</td>
                <td>{{ $dados['email'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>