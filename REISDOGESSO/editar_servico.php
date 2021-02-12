<?php
    include "cabecalho.php";
    include "conexao.php";
?>
    <script>
      $(document).ready(function() {
        $('#MyModal').modal('show');
      })
  </script>

<?php
    $id = $_POST["id"];

    $select = "SELECT * FROM servico WHERE id_servico ='$id'";
    $result = mysqli_query($conexao,$select);
    $linha = mysqli_fetch_array($result);

echo'
    <div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar serviço</h5>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <img class="mb-4 mx-auto" src="img/favicon.png" alt="Logo Reis do Gesso" width="72" height="72">
        </div>
        <form action="altera_servico.php" method="POST">
        <input type="hidden" name="id" value="'.$linha["id_servico"].'">
        <div class="col">
          <div class="input-group-prepend">
            <div class="input-group-text">Nome</div>
                <input type="text" class="form-control" name="nome" value="'.$linha["nome"].'"/>
            </div>
          </div>
        <br>
        <div class="col">
          <div class="input-group-prepend">
            <div class="input-group-text">Preço</div>
                <input type="number" step="0.01" class="form-control" name="preco" value="'.$linha["preco"].'" />
            </div>
          </div>
        <br>
        <div class="col">
          <div class="input-group-prepend">
            <div class="input-group-text">Descrição</div>
                <textarea class="form-control" name="descricao">'.$linha["descricao"].'</textarea>
            </div>
          </div>
      <div class="modal-footer">
        <a href="servicos.php">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </a>
        <button type="submit" class="btn btn-primary">Alterar</button>
      </div>
    </div>
    </form>
  </div>
</div>
';
    include "rodape.php";
?>