<?php

if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
    session_start();
  }



if(!$_SESSION['nome']) {
	header('Location: index.php');
	exit();
}
?>