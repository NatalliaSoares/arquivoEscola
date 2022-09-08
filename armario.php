<?php
require "config.php";
require_once "classes/Armarios.php";

$a = new Armarios();

$armarios = $a->listar();

if(isset($_GET['campo_pesquisa'])){
    $pesquisa = $_GET['campo_pesquisa'];

    $armarios = $a->pesquisar($pesquisa);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./assets/js/script.js"></script>
    <title>Armário</title>
</head>

<body>
    <header>
        <a class="div-btn-menu" href="#">
            <img class="botao-menu" src="./assets/images/menu.svg" alt="Botão Menu">
        </a>
        <div class="titulo-menu">
            <h1>Armário</h1>
        </div>
    </header>
    <div id="menu">
        <ul>
            <li>
                <img class="icon" src="./assets/images/alunos-2.png" alt="alunos">
                <p>Alunos</p>
            </li>
            <li>
                <img class="icon" src="./assets/images/usuarios-2.png" alt="usuarios">
                <p>Usuários</p>
            </li>
            <li>
                <img class="icon" src="./assets/images/armario-2.png" alt="armario">
                <p>Armário</p>
            </li>
        </ul>
    </div>
    <div class="container fundo">
        <form>
            <div class="campo-pesquisa">
                <input type="text" placeholder="Digite sua pesquisa aqui" class="form-control" name="campo_pesquisa"/>
                <button type="submit" class="btn btn-primary botao-pesquisa">Pesquisar</button>
            </div>
        </form>
        <div class="lista">
            <table class="table table-striped">
                <thead>
                    <th>Data da Criação</th>
                    <th>Usuário Responsável</th>
                    <th>Status</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    <?php foreach ($armarios as $armario) : ?>
                        <tr>
                            <td><?php echo $armario['data_criacao']  ?></td>
                            <td><?php echo $armario['usuario_responsavel']  ?></td>
                            <td><?php echo $armario['status']  ?></td>
                            <td><?php echo $armario['descricao']  ?></td>
                            <td>
                                <a href="#" class="btn btn-warning">Editar</a>
                                <a href="#" class="btn btn-danger">Desativar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="./armario/cadastrar.php" class="btn btn-success botao-cadastrar">Cadastrar</a>
    </div>
</body>

</html>