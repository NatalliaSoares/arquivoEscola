<?php

require_once './config.php';

class Usuarios
{

	public function logar($usuario, $senha)
	{
		global $db;
		$informacoesusuario = array();
		$sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
		$sql = $db->prepare($sql);
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$informacoesusuario = $sql->fetch();
			$_SESSION['idusuario'] = $informacoesusuario['id'];
			header("Location: index.php");
		} else {
			$_SESSION['error'] = "Usuário e/ou senha inválidos!";
			return false; // não encontrou nenhum usuário
		}
	}
}
