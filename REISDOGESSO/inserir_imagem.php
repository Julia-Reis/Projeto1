<?php
    include "cabecalho.php";
    include "conexao.php";
?>
 <script>
      $(document).ready(function() {
        $('#MyModal').modal('show');
      })
  </script>
        <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Imagens de serviços</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="processa_imagem.php">
                        <div class="text-center">
                            <img id="img_cadastrar" class="mb-4 mx-auto" src="img/favicon.png" alt="Logo Reis do Gesso" width="72" height="72">
                        </div>
                        <h1 class="h3 mb-3 text-center">Cadastrar</h1>
                        <select id="cod_servico" name="cod_servico" class="form-control">
                            <option> Tipo de Serviço </option>
                            <?php
                                require_once "conexao.php";
                                $sql = "SELECT id_servico, nome FROM servico ORDER BY nome";
                                $result = mysqli_query($conexao, $sql);
                               // $row = mysqli_fetch_array($result);
                                
                                while($linha = mysqli_fetch_array($result)){
                                    echo '<option value="'.$linha["id_servico"].'">'.$linha["nome"].'</option>';
                                }
                                
                            ?>
                        </select>
                        <br>
                        <div class="custom-file">
                            <input type="file" id="arquivo" name="arquivo" class="custom-file-input" lang="pt-BR" required autofocus>
                            <label class="custom-file-label" for="customFile">Carregue a imagem</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <a href="index.php">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                      </a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <script>
            // Limpar os campos após todo o processo
            document.getElementById('arquivo').value=':: Selecione a imagem ::';
            document.getElementById('cod_servico').value=':: Selecione o serviço ::';
            //window.location.href = "index.php";
        </script>
<?php
    include "rodape.php";
?>