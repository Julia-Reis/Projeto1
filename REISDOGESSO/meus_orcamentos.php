<?php
    include "cabecalho.php";
    include "conexao.php";

    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<br>";

    echo'
      <table border="1" class="table table-hover text-center">
      <thead>
        <tr style="background-color: #00C5CD;">
          <th scope="col"> ORÇAMENTOS CADASTRADOS </th>
          <th scope="col"> EXCLUIR </th>
        </tr>
      </thead>
      <tbody>
    ';
      $cod_usuario = $_SESSION["id_usuario"];
      $sql = "SELECT id_orcamento FROM orcamento WHERE cod_usuario = '$cod_usuario' ORDER BY id_orcamento DESC";
      $result = mysqli_query($conexao,$sql);

        while($row = mysqli_fetch_assoc($result)){
          $orcamentos[] = $row;
        }
          if(empty($orcamentos)){
            echo '
            <tr>
              <th colspan="2">Ainda não há orçamentos cadastrados</th>
              </tr>
              ';
          }else{
            foreach($orcamentos as $cada_orcamento){
            echo '
              <tr>
                <td>
                  <form action="mostra_orcamento.php" method="POST">
                    <button type="number" class="btn btn-outline-success" name="codigo_busca" value="'.$cada_orcamento["id_orcamento"].'">
                      <b>Orcamento -> N° '.$cada_orcamento["id_orcamento"].'</b></button>
                  </form>
                </td>
                <td>
                  <form action="excluir_orcamento.php" method="POST">
                  <input type="hidden" name="id" value="'.$cada_orcamento["id_orcamento"].'">
                    <button type="submit" name="excluir_orcamento" class="btn btn-outline-danger">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                      </svg>
                  </button>
                  </form>
                </td>
              </tr>
            ';
            }
          }
        
        echo'
          </tbody>
        </table>
        ';
      
    include "rodape.php";
?>