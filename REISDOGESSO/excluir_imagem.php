<?php
include "conexao.php";

$id = mysqli_real_escape_string($conexao, trim($_POST['id']));
print_r($id);

    if(isset($_POST["excluir_imagem"])){
        $comando_excluir = "DELETE FROM imagens_servico WHERE id_imagem_servico='$id'";
        $resultado = mysqli_query($conexao, $comando_excluir);
        $pega_linha = mysqli_fetch_array($resultado);
    }
   header("Location: index.php");
?>