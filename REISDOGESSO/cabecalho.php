<?php
session_start();


echo '
    <!DOCTYPE html>
      <html lang="pt-BR">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
          <link rel="stylesheet" href="css/css.css">
          <link rel="shortcut icon" type="image/png" href="img/favicon.png">
          <title>Reis do Gesso!</title>

          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        </head>
        <body>
        <div class="container">
          <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="index.php"><img id="logo" src="img/Reis do Gesso.png" alt="Reis do Gesso"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Inicio</a>
                </li>';
                if(!isset($_SESSION['usuario']) || $_SESSION["permissao"] == 0){
                    echo '
                <li class="nav-item active">
                  <a class="nav-link" href="orcamento.php">Orçamento</a>
                </li>';
                }
                echo'
                <li class="nav-item active">
                  <a class="nav-link" href="contato.php">Contato</a>
                </li>';
                //session_start();
                if(isset($_SESSION['usuario'])){
                  if($_SESSION["permissao"] == 1){
                echo'
                <div class="dropdown">
                  <a class="btn dropdown-toggle" style="background-color: black; color: white;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Administrativo
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="inserir_imagem.php">Nova imagem</a>
                    <a class="dropdown-item" href="inserir_servico.php">Novo serviço</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a class="btn dropdown-toggle" style="background-color: black; color: white;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Relatórios
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="clientes.php">Clientes</a>
                    <a class="dropdown-item" href="servicos.php">Serviços</a>
                    <a class="dropdown-item" href="#">Orçamentos aprovados</a>
                    <a class="dropdown-item" href="#">Orçamentos serviços</a>
                  </div>
                </div>
                ';
                  }
                }
                if(isset($_SESSION['usuario']) && $_SESSION["permissao"] == 0){
                  echo '
                  <li class="nav-item active">
                    <a class="nav-link" href="meus_orcamentos.php">Meus orçamentos</a>
                  </li>
                  </ul>';
                }else{
                echo'
                  </ul>';
                }
                echo'
              <a class="nav-link" href="login.php">Entrar</a>
              ';
              $nomepagina = basename(__FILE__);
              
              if(!isset($_SESSION['usuario']) || $_SESSION["permissao"] == 0){
                if(basename($_SERVER['PHP_SELF'],'.php') == "index"){         
                echo'
                <form action="resultado_pesquisa.php" method="POST" class="form-inline mt-2 mt-md-0" >
                  <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="Pesquisar..." aria-label="Search">
                  <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                </form>';
                }
              }
              
              if(isset($_SESSION['usuario'])){
                echo'
                  <ul class="navbar-nav">
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      Minha conta
                    </button>
                    <div class="dropdown-menu dropdown-menu-left">
                      <a class="dropdown-item" href="#">Olá, '.$_SESSION['nome'].'</a>
                      <a class="dropdown-item" href="editar_usuario.php">Editar dados</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php">Sair</a>
                    </div>
                  </div>
                  </ul>
                  </div>
                </nav>
                  ';
                }else{
                echo'
            </div>
          </nav>
          ';
                }
  ?>