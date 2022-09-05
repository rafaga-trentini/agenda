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
            @foreach ($_SESSION['usuario'] as $usuario)
            <tr>
                <td>{{ $usuario['nome'] }}</td>
                <td>{{ $usuario['telefone'] }}</td>
                <td>{{ $usuario['email'] }}</td>
                <td><a href="{{ route('agenda.edit', $usuario['id']) }}">Edit</a></td>
                <td><a href="{{ route('agenda.destroy', $usuario['id']) }}">Show</a></td>
                <td>
                    <form action="{{ route('agenda.destroy', $usuario['id'])}}" method="post">
                        @method("DELETE")
                        <input type="submit" value="Deletar"></input>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>