<?php
require_once "classes/Usuarios.php";
$usuarios = new Usuarios();

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = filter_var($_POST['usuario']);
    $senha = filter_var($_POST['senha']);
    $usuarios->logar($usuario, $senha);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/estilo.css">
    <title>Login</title>
</head>

<body>
    <div class="fundo-login">
        <div class="titulo">
            <h3>Arquivo de Alunos Antigos</h3>
        </div>
        <div class="row">
            <img src="./assets/images/logo.png" alt="Logo Polivalente" class="logo rounded mx-auto d-block">
        </div>
        <div class="row">
            <form method="POST" action="">
                <label for="usuario" class="form-label mt-3">Usuário</label>
                <input type="text" name="usuario" class="form-control" placeholder="Digite seu usuário" required autofocus>

                <label for="senha" class="form-label mt-3">Senha</label>
                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required autofocus>
                <div class="d-grid gap-2">
                    <button type="submit" class="botao-entrar btn btn-success mt-3 mb-3 btn-block">Entrar</button>
                    <div>
            </form>
        </div>
    </div>
</body>

</html>