<?php
    include "cabecalho.php";
    include "conexao.php";

    if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
        session_start();
      }
    

    $email = $_SESSION["email"];

    $query = "SELECT * FROM USUARIO WHERE email = '$email'";
      
    $result = mysqli_query($conexao, $query);

    $row = mysqli_fetch_assoc($result);
   
    echo '
    <div class="card" id="telaCadastrar">
    <div class="card-body" id="form_edita_usuario">
        <form method="POST" action="altera_usuario.php">
            <div class="text-center">
                <img id="img_cadastrar" class="mb-4 mx-auto" src="img/favicon.png" alt="Logo Reis do Gesso" width="72" height="72">
            </div>
            <h1 class="h3 mb-3 text-center">Editar cadastro</h1>
            <input type="hidden" name="id" value="'.$row["id_usuario"].'">
            
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome e sobrenome" value="'.$row["nome"].'" required autofocus>
            
            <input type="number" id="telefone" name="telefone" class="form-control" placeholder=" DDD + numero" value="'.$row["telefone"].'"required autofocus>
            
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" maxlenght="11" value="'.$row["email"].'" disabled>

            <input type="password" id="senha" name="senha" maxlength="15" class="form-control" placeholder="senha" value="'.$row["senha"].'"required>
            <br>
            <div class="botao_login_cadastrar">
                <button type="submit" id="cadastrar" class="btn btn-info">Salvar</button>
            </div>
            <br>
        </form>
        <form action="excluir_conta.php" method="POST">
            <input type="hidden" name="id" value="'.$row["id_usuario"].'">
            <div class="botao_login_cadastrar">
                <button type="submit" id="excluir" name="excluir_conta" class="btn btn-danger">Excluir conta</button>
            </div>
        </form>
    </div>
</div>

';
    
    include "rodape.php";
?>