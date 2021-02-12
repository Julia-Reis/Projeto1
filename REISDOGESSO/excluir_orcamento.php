<?php
include "conexao.php";

$id = mysqli_real_escape_string($conexao, trim($_POST['id']));
print_r($id);

    if(isset($_POST["excluir_orcamento"])){
        $comando_excluir1 = "DELETE FROM orcamento WHERE id_orcamento='$id'";
        $resultado1 = mysqli_query($conexao, $comando_excluir1);
        $pega_linha1 = mysqli_fetch_array($resultado1);

        $comando_excluir2 = "DELETE FROM orcamento_item WHERE cod_orcamento='$id'";
        $resultado2 = mysqli_query($conexao, $comando_excluir2);
        $pega_linha2 = mysqli_fetch_array($resultado2);
    }
   header("Location: meus_orcamentos.php");
?>