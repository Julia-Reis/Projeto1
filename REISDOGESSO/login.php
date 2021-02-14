<?php
include "cabecalho.php";
echo'
    <div class="card" id="telaLogin">
        <form name="form_login" method="post" action="autentica_login.php">
            <div class="text-center">
                <img class="mb-4 mx-auto" src="img/favicon.png" alt="Logo Reis do Gesso" width="72" height="72">
            </div>
            <h1 class="h3 mb-3 text-center">Login</h1>
            <br>
            <label class="sr-only">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email..." required autofocus>
            
            <label  class="sr-only">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" placeholder="senha" required>
            <br>
            <div class="botao_login_cadastrar">
            <button type="submit" id="login" class="btn btn-info">Entrar</button>
            </div>
            <br>
            <a href="cadastro.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
        </form>
    </div>
   </div>
  </body>
 </html>
';
?>