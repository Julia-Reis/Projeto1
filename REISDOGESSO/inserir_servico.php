<?php
     include "cabecalho.php";
     include "conexao.php";
?>
  <script>
      $(document).ready(function() {
        $('#MyModal').modal('show');
      })
  </script>
    <div class="modal fade" id="MyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Serviços</h5>
      </div>
      <div class="modal-body">
        <div class="text-center">
            <img class="mb-4 mx-auto" src="img/favicon.png" alt="Logo Reis do Gesso" width="72" height="72">
        </div>
        <form action="processa_servico.php" method="POST">
        <div class="col">
          <div class="input-group-prepend">
            <div class="input-group-text">Nome</div>
                <input type="text" class="form-control" name="nome" required/>
            </div>
          </div>
        <br>
        <div class="col">
          <div class="input-group-prepend">
            <div class="input-group-text">Preço</div>
                <input type="number" step="0.01" class="form-control" name="preco" required />
            </div>
          </div>
        <br>
        <div class="col">
          <div class="input-group-prepend">
            <div class="input-group-text">Descrição</div>
                <textarea class="form-control" name="descricao" required></textarea>
            </div>
          </div>
      <div class="modal-footer">
        <a href="index.php">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </a>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<?php
     include "rodape.php";
?>