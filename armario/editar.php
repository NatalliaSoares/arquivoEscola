<?php
require '../config.php';
require_once "../classes/Armarios.php";

$a = new Armarios();

if (isset($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
    $a->editar($descricao);
}

$descricao = array();

$id=$_GET['id'];    
global $db;
$info = array();
$sql="SELECT * FROM armario WHERE id = :id";
$sql = $db->prepare($sql);
$sql->bindValue(":id",$id);
$sql->execute();

if($sql->rowCount() > 0){
    $info = $sql->fetch();
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
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <title>Cadastrar Armário</title>
</head>

<body>
    <header>
        <div class="titulo-menu">
            <h1>Editar Armário</h1>
        </div>
    </header>
    <div class="container fundo">
        <form method="POST">
            <label for="Descrição">Descrição</label>
            <input type="text" name="descricao" class="form-control" value="<?php echo $info['descricao']?>"/>
            </br>
            <button class="btn btn-primary">Editar</button>
            <a href="../armario.php" class="btn btn-warning">Voltar</a>
        </form>
    </div>
</body>
</html>