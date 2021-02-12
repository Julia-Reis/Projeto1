<?php
    session_start();
    include("conexao.php");

    $id = mysqli_real_escape_string($conexao, trim($_POST['id']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

    $sql = "UPDATE USUARIO SET nome='$nome', telefone='$telefone', email='$email', senha='$senha' WHERE id_usuario='$id'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($conexao->query($sql) === TRUE) {
        if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
            session_start();
          }
        $_SESSION["id_usuario"] = $id;
        $_SESSION["nome"] = $nome;
        $_SESSION["telefone"] = $telefone;
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        echo '<script>
            window.alert("Usuário alterado com sucesso!");
        </script>';
    }

    $conexao->close();

    header('Location: index.php');
    exit;
?>