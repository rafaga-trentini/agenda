<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('agenda.update', $dados['id']) }}" method="post">
        @method('PUT')
        <label for="nome">Nome completo</label>
        <input type="text" value="{{  $dados['nome'] }}" id="nome" name="nome"></input>
        <label for="telefone">Telefone</label>
        <input type="text" value="{{ $dados['telefone'] }}" id="telefone" name="telefone"></input>
        <label for="email">E-mail</label>
        <input type="email" value="{{ $dados['email'] }}" id="email" name="email"></input>
        <input type="submit" value="Enviar"></input>
    </form>
</body>
</html>