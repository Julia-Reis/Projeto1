<?php
    session_start();
    include("conexao.php");

    $id = mysqli_real_escape_string($conexao, trim($_POST['id']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $preco = mysqli_real_escape_string($conexao, trim($_POST['preco']));
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    $sql = "UPDATE servico SET nome='$nome', preco='$preco', descricao='$descricao' WHERE id_servico='$id'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($conexao->query($sql) === TRUE) {
        if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
            session_start();
        }
    ?>
        <script>
            window.alert("Serviço alterado com sucesso!");
        </script>
    <?php
    }

    $conexao->close();

    header('Location: index.php');
    exit;
?>