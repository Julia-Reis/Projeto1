<?php
    include "cabecalho.php";

      if($_SESSION['usuario'] == 'logado'){
        ?>
         <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>          
          <form class="row g-3" id="form_servico" method="POST" action="calcula_orcamento.php">
            <div id="formulario-orcamento">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="exampleFormControlInput1">Metros</label>
                  <input type="number" class="form-control" name="metros1" id="metros1" min="10" placeholder="Ex: 20">
                </div>
                <div class="form-group col-md-6">
                  <label> Tipo de Serviço </label>
                    <select name="cod_servico1" class="form-control">
                      <option> ::Selecione:: </option>
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
                    
                  <input type="hidden" name="total_campos" value="1"/>
                    
                </div>
              </div>
              
              <!--
              <a href="javascript:void(0)" id="add-campo" class="btn btn-primary">Adicionar mais campos
                </a>
                -->
                <div id="formulario-adicional"></div>
                <button type="submit" id="login" class="btn btn-info">Calcular</button>
                <form action="orcamento.php#campos" method="POST">
                  <button type="button" id="add-campo" name="add-campo" class="btn btn-primary">Adicionar mais campos</button>
                </form>
            </form>
            <script>
            var contador = 2;
                $("#add-campo").click(function () {
                    $("#formulario-adicional").append('\
                    <div class="form-row">\
                    <div class="form-group col-md-4">\
                      <label for="exampleFormControlInput1">Metros</label>\
                      <input type="number" class="form-control" name="metros'+ contador +'" id="metros'+ contador +'" placeholder="Ex: 20" required>\
                    </div>\
                    <div class="form-group col-md-6">\
                      <label> Tipo de Serviço </label>\
                        <select name="cod_servico'+ contador +'" id="cod_servico'+ contador +'" class="form-control required">\
                          <option> ::Selecione:: </option>\
                          <?php
                              require_once "conexao.php";
                              $sql = "SELECT id_servico, nome FROM servico ORDER BY nome";
                              $result = mysqli_query($conexao, $sql);
                              // $row = mysqli_fetch_array($result);
                                        
                              while($linha = mysqli_fetch_array($result)){
                                echo '<option value="'.$linha["id_servico"].'">'.$linha["nome"].'</option>';
                              }
                            ?>
                        </select>\
                    </div>\
                    <input type="hidden" class="form-control" name="total_campos" id="total_campos" value="'+ contador +'">\
                  </div>');
                 
                  contador++;
                });
            </script>
      <?php
      }else{
        header('Location: login.php');
	        exit();
      }
    include "rodape.php";
?>