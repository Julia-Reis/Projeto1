<?php
    include "cabecalho.php";
    include "conexao.php";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
        if(!empty($_POST["pesquisa_servico"])){
            $informacao = $_POST["pesquisa_servico"];
            echo'
            <form action="#" enctype="multipart/form-data" method="POST" class="form-inline mt-2 mt-md-0 " >
                <input class="form-control mr-sm-2" type="text" id="pesquisa_servico" name="pesquisa_servico" placeholder="Pesquisar servico" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal" data-target="#modalDrywall" type="submit">Pesquisar</button>
            </form> 
            <br>
            <div class="tabela">
            <table border="1" class="table table-hover text-center"">
            <tr style="background-color: #00C5CD;">
                <td><b> Nome do Serviço</b></td>
                <td><b> Descriçao </b></td>
                <td><b> Preço </b></td>
                <td><b> Editar </b></td>
                <td><b> Excluir </b></td>
            </tr>';
            $sql = "SELECT id_servico, nome, descricao, preco FROM servico 
                WHERE nome LIKE '%$informacao%' OR descricao LIKE '%$informacao%' OR preco LIKE '%$informacao%' ORDER BY nome";
            $result = mysqli_query($conexao,$sql);
        
            while($row = mysqli_fetch_assoc($result)){
                $servicos[] = $row;
                
            echo '
            <tr>
                <td>'.$row["nome"].'</td>
                <td>'.$row["descricao"].'</td>
                <td>'.$row["preco"].'</td>
                <td>
                    <form method="POST" action="editar_servico.php">
                        <input type="hidden" name="id" value="'.$row["id_servico"].'">
                        <button type="submit" name="editar_servico" class="btn btn-outline-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        </button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="excluir_servico.php">
                        <input type="hidden" name="id" value="'.$row["id_servico"].'">
                        <button type="submit" name="excluir_servico" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                        </svg>
                        </button>
                    </form>
                </td>
            </tr>
            ';
            }
            echo'
                </table>
            </div>';
          ?>
          <script>
            // Limpar o campos após o processo
            document.getElementById('pesquisa_servico').value='';
        </script>
        <?php
        }else{
        echo '
        <form action="#" enctype="multipart/form-data" method="POST" class="form-inline mt-2 mt-md-0 " >
            <input class="form-control mr-sm-2" type="text" name="pesquisa_servico" placeholder="Pesquisar servico" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal" data-target="#modalDrywall" type="submit">Pesquisar</button>
        </form>
        <br>
        <div class="tabela">
            <table border="1" class="table table-hover text-center"">
            <tr style="background-color: #00C5CD;">
                <td><b> Nome do Serviço</b></td>
                <td><b> Descriçao </b></td>
                <td><b> Preço </b></td>
                <td><b> Editar </b></td>
                <td><b> Excluir </b></td>
            </tr>';
            $sql = "SELECT id_servico, nome, descricao, preco FROM servico ORDER BY nome";
            $result = mysqli_query($conexao,$sql);
        
            while($row = mysqli_fetch_assoc($result)){
                $servicos[] = $row;
                
            echo '
            <tr>
                <td>'.$row["nome"].'</td>
                <td>'.$row["descricao"].'</td>
                <td>'.$row["preco"].'</td>
                <td>
                    <form method="POST" action="editar_servico.php">
                        <input type="hidden" name="id" value="'.$row["id_servico"].'">
                        <button type="submit" name="editar_servico" class="btn btn-outline-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                        </button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="excluir_servico.php">
                        <input type="hidden" name="id" value="'.$row["id_servico"].'">
                        <button type="submit" name="excluir_servico" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                        </svg>
                        </button>
                    </form>
                </td>
            </tr>
            ';
            }
            echo'
                </table>
            </div>
          ';

        }
    include "rodape.php";
?>