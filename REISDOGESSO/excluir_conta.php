<?php
include "conexao.php";

$id = mysqli_real_escape_string($conexao, trim($_POST['id']));
print_r($id);

    if(isset($_POST["excluir_conta"])){
        $comando_excluir = "DELETE FROM usuario WHERE id_usuario='$id'";
        $resultado = mysqli_query($conexao, $comando_excluir);
        $pega_linha = mysqli_fetch_array($resultado);
        if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
            session_start();
          }
    session_destroy();
    }
   header("Location: index.php");
?>