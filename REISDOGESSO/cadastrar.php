<?php
    session_start();
    include("conexao.php");

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $permissao = mysqli_real_escape_string($conexao, trim($_POST['permissao']));


    $sql = "select count(*) as total from usuario where email = '$email'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1) {
        $_SESSION['usuario_existe'] = true; // Email ja é cadastrado, volta para a pagina de cadastro
        echo '<script>
        window.alert("Usuário ja é cadastrado!");
        window.location.href = "login.php";
        </script>';
    }

    $sql = "INSERT INTO usuario (nome, telefone, endereco, cidade, email, senha, permissao) 
        VALUES ('$nome','$telefone','$endereco','$cidade','$email','$senha','$permissao')";

   if($conexao->query($sql) === TRUE) {
        if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
            session_start();
          }
        $_SESSION["nome"] = $nome;
        $_SESSION["telefone"] = $telefone;
        $_SESSION["email"] = $email;
        $_SESSION["endereco"] = $endereco;
        $_SESSION["cidade"] = $cidade;
        $_SESSION["senha"] = $senha;
        $_SESSION['status_cadastro'] = true;
        echo'
        <script>
        window.alert("Usuário cadastrado com sucesso.");
        window.location.href = "login.php";
        </script>';

   }
?>