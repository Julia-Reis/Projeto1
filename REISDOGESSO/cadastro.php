<?php
include "cabecalho.php";
echo'
<br>
<br>
<br>
    <div class="card" id="telaCadastrar">
        <div class="card-body" id="form_cadastro">
            <form method="POST" action="cadastrar.php">
                <div class="text-center">
                    <img id="img_cadastrar" class="mb-4 mx-auto" src="img/favicon.png" alt="Logo Reis do Gesso" width="72" height="72">
                </div>
                <h1 class="h3 mb-3 text-center">Cadastrar</h1>
                <label>Nome e Sobrenome: </label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome e sobrenome" required autofocus>
                
                <label>Telefone: </label>
                    <input type="number" id="telefone" name="telefone" class="form-control" placeholder=" DDD + numero" required autofocus>
                
                <label>Endereço: </label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Avenida Nove de Julho, 267" required autofocus>
                
                <label>Cidade: </label>
                    <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Araraquara - SP" required autofocus>
                
                    <div class="row">
                    <div class="col">
                        <label>Email: </label>
                            <input type="email" autocomplete="email" id="email" name="email" class="form-control" placeholder="Email" maxlenght="11" required autofocus>
                    </div>
                    <div class="col">
                        <label>Senha: </label>
                            <input type="password" autocomplete="current-password" id="senha" name="senha" maxlength="15" class="form-control" placeholder="senha" required>
                    </div>
                </div>
                <input type="hidden" id="permissao" name="permissao" value="0">
                <br>
                <div class="botao_login_cadastrar">
                    <button type="submit" id="cadastrar" class="btn btn-info">Cadastrar</button>
                </div>
                <br>
            </form>
        </div>
    </div>';

?>