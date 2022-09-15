<?php

class Armarios
{


  public function listar()
  {
    //consulta para exibir os armarios
    global $db;
    $armarios = array(); //variavel que vai armazenar o resultado da consulta

    $sql = "SELECT * FROM armario WHERE status = 1";
    $sql = $db->prepare($sql);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $armarios = $sql->fetchAll(); // salvando o resultado da consulta
    }


    return $armarios; // devolvendo o resultado da consulta
  }

  //NATALIA
  // DEVE REALIAR O CADASTRO DO ARMÁRIO
  public function cadastrar($descricao)
  {
    global $db;
    // LÓGICA PARA CADASTRAR ARMARIO
    $sql = "INSERT INTO armario SET descricao = :descricao, data_criacao = NOW(), usuario_responsavel = :usuario, status = 1";
    $sql = $db->prepare($sql);
    $sql->bindValue(":descricao", $descricao);
    $sql->bindValue(":usuario", 1);
    $sql->execute();
    /*echo "<pre>";
    print_r($sql->errorInfo());
    exit;*/
    if ($sql) {
      header("Location: ../armario.php");
    }
  }

  // DAVI
  // DEVE ALTERAR O CAMPO STATUS DA TABELA ARMARIO PARA O VALOR 0
  public function desativar($id)
  {
    global $db;

    $id=$_GET['id'];
    $status=$_GET['status'];

    if($status != '0'){
      $sql = "UPDATE armario SET status = '0' WHERE  id=:id";
  
      $sql=$db->prepare($sql);
      $sql->bindValue(":id", $id);
      $sql->execute();  
      
      header("Location: ../armario.php");
    }elseif($status != '1') {
      $sql = "UPDATE armario SET status = '1' WHERE  id=:id";
  
      $sql=$db->prepare($sql);
      $sql->bindValue(":id", $id);
      $sql->execute(); 
      
      header("Location: ../armario.php");
    }
    $armarios = $sql->fetchAll();
    return $armarios;
  }

  public function editar($descricao)
  {
    global $db;
    $id=$_GET['id'];

    $sql = "UPDATE armario SET descricao = :descricao WHERE  id=:id";

    $sql=$db->prepare($sql);
    $sql->bindValue(":descricao", $descricao);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql){
      header("Location: ../armario.php");
    }
    $armarios = $sql->fetchAll();
    return $armarios;
  }

  public function pesquisar($pesquisa)
  {
    global $db;
    
    $sql = "SELECT * FROM armario WHERE descricao LIKE :descricao";
    $sql = $db->prepare($sql);
    $sql->bindValue(":descricao", "%" . $pesquisa . "%");
    $sql -> execute();
    
    $armarios = $sql->fetchAll();

    return $armarios;
  }

  public function listar_todos()
  {
    global $db;

    $sql = "SELECT * FROM armario";
    $sql = $db->prepare($sql);
    $sql -> execute();

    $armarios = $sql->fetchAll();
    return $armarios;
  }
}
