<?php
    include "cabecalho.php";
    include "conexao.php";
    
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
$buscar =  $_POST['buscar'];
$sql_bd = "SELECT nome, descricao FROM servico WHERE nome LIKE '%$buscar%' OR descricao LIKE '%$buscar%'";
$result_bd = mysqli_query($conexao, $sql_bd);
$linha_bd = mysqli_fetch_array($result_bd);



    if(empty($_POST['buscar'])) {
        echo '<script>
        window.alert("Campo em branco!");
        window.location.href = "index.php";
        </script>'; 
    }elseif(empty($linha_bd) === TRUE){
      echo '<script>
      window.alert("Serviço não encontrado, tente novamente!");
      window.location.href = "index.php";
      </script>';
    }else{

        echo '
        <div class="row">
            <table class="table">
            <h2 class="text">Serviços relacionados á "<b>'.$buscar.'</b>"</h2>
            <tr>
            ';
              $sql = "SELECT i.id_imagem_servico, i.arquivo, s.nome, s.descricao FROM imagens_servico i  
              inner join servico s on i.cod_servico = s.id_servico WHERE s.nome LIKE '%$buscar%' OR s.descricao LIKE '%$buscar%'";
              $result = mysqli_query($conexao, $sql);
              $cont = 0;
                while($linha = mysqli_fetch_array($result)){
                  if(empty($linha) == true){
                    echo '
                      <td>
                        <h2>Serviço não encontrado, tente outro.</h2>
                      </td>
                      </tr>
                    ';
                  }else{
                  $imagens[] = $linha;
                echo '
                  <td>
                    <img src="img/fotos/'.$linha["arquivo"].'" width="200px" height="200px">
                    <h3><b>'.$linha["nome"].'</b></h3>
                  </td>
                  ';
              $cont++;
              if($cont == 5){
                echo "</tr>";
                echo "<tr>";
                $cont = 0;
            }
          }
        }
                echo'
       </tr>
            </table>
            </div> 
            </div>
            </body>
            </html>';
        }
?>