<?php
    include "conexao.php";

		$nome = $_POST["nome"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];

        $insert = "INSERT INTO servico(nome, preco, descricao) 
            VALUES('$nome', '$preco', '$descricao')";
       $conexao->query($insert);
        echo '
        <script>
            window.alert("Serviço cadastrado com sucesso!");
            window.location.href = "index.php";
        </script>';
?>