<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('agenda.store')}}" method="post">
        @method("POST")
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome"></input>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone"></input>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"></input>
        <input type="submit" value="Enviar"></input>
    </form>
</body>
</html>