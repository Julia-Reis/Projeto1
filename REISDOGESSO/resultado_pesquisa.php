<?php
    include "conexao.php";
    
    if(empty($_POST['buscar'])) {
        echo '<script>
        window.alert("Campo em branco!");
        window.location.href = "http://localhost/Furquim/Projeto%20Final/REISDOGESSO/index.php";
        </script>';      
    }else{

    $buscar = mysqli_real_escape_string($conexao, $_POST['buscar']);

    $query = "SELECT * FROM servico WHERE nome LIKE '%$buscar%'";

    $result = mysqli_query($conexao, $query);


        // $row = mysqli_num_rows(mysql_result(result));
        $row = mysqli_num_rows($result);
            if($row > 0){
                while($linha = mysqli_fetch_array($result)) {
                    $nome = $linha['nome'];
                    $descricao = $linha['descricao'];
                    
                    echo '
                    <div id="index" class="card-deck">   
                    <div class="card">
                        <img src="img/forro.jpg" data-toggle="modal" data-target="#modalForros" width="100px" height="300px" class="card-img-top" alt="Forro em gesso">
                        <div class="card-body">
                            <h5 class="card-title" data-toggle="modal" data-target="#modalForros">Forros</h5>
                            <p class="card-text">Prático e versátil, o forro de gesso é uma das opções de cobertura mais utilizadas em projetos arquitetônicos e de decoração, para rebaixar teto, disfarçar vigas, imperfeições, e embutir iluminação especial. Além disso, promove efeito estético permitindo a criação de formas e desenhos</p>
                        </div>
                    </div>
                    <div class="modal-livros"> <!--  -->
                        <div class="modal fade" id="modalForros" tabindex="-1" aria-labelledby="exampleModalForros" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalForros">Forros</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                      </div>
                      <div id="texto-modal" class="modal-body">
                                  <p style="text-align: center;">
                                    No auge da Segunda Guerra Mundial uma garota ganha em seu aniversário de 13 anos um caderno de autógrafos.
                                    Tinha um fecho, capa dura de tecido xadrez vermelho e branco.
                                    O nome da garota era Anne Frank e ela gostava muito de escrever.
                                    Por isso, transforma o caderno em um diário.
                                    Menos de um mês depois, Anne, a irmã Margot e os pais vão para um esconderijo secreto,
                                    onde passam mais de dois anos, com outras quatro pessoas, para não serem enviados para um campo de concentração.
                                  </p>
                                </div>
                      <div class="imagens-modal">
                        <table>
                          <tr>';
                          
                          $sql_forro = "SELECT i.id_imagem_servico, i.arquivo, s.nome FROM imagens_servico i  
                          inner join servico s  on i.cod_servico = s.id_servico WHERE s.nome LIKE '%Forro%'";
                          $result_forro = mysqli_query($conexao, $sql_forro);
                          $row_forro = mysqli_fetch_array($result_forro);
                          
                            while($linha_forro = mysqli_fetch_array($result_forro)){
                              $imagens_forro[] = $linha_forro;
                            }
                            if(empty($imagens_forro)){
                              echo "<h2> Ainda não há imagens cadastradas! </h2>"; 
                           }else{
                          $cont = 0;
                          foreach($imagens_forro as $row_forro){
                           
                            $cont++;
                            echo '
                            <td>
                              <img src="img/fotos/"'.$row_forro["arquivo"].'" width="200px" height="200px"/>
                              <br />
                              <form method="POST" action="excluir_imagem.php">
                            
                              <input type="hidden" name="id" value="'.$row_forro["id_imagem_servico"].'">
                              
                              <button type="submit" name="excluir_imagem" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                            </svg>
                            </button>
                            </form>
                            </td>';
                           
                              if($cont == 3){
                                  echo "</tr>";
                                  echo "<tr>";
                                  $cont = 0;
                              }
                          }
                        }
                        echo '
                         </tr>
                        </table>
                        </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>';
                }
            } else {
                echo '<script>
                    window.alert("Serviço não encontrado. Tente outra descrição.");
                    window.location.href = "http://localhost/Furquim/Projeto%20Final/REISDOGESSO/index.php";
                </script>';
            }
        }
                
?>