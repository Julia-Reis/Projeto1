<?php
include "conexao.php";

if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
    session_start();
  }

if(empty($_POST['email']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT id_usuario, permissao, nome FROM usuario WHERE email = '{$email}' AND senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['nome'] = $usuario_bd['nome'];
	if (!isset($_SESSION)) { //Verificar se a sessão não já está aberta.
		session_start();
	  }	
			$_SESSION['usuario'] = 'logado';
			$_SESSION['id_usuario'] = $usuario_bd['id_usuario'];
			$_SESSION['permissao'] = $usuario_bd['permissao'];
			$_SESSION['email'] = $email; // Salvei o email na sessao para poder usar como ID para editar os dados
			header('Location: index.php');
} else {
	$_SESSION['nao_autenticado'] = true;
	echo '<script>
        window.alert("Usuário ou senha incorretos. Tente novamente.");
        window.location.href = "login.php";
        </script>'; 
	exit();
}
?>