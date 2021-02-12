<?php
    include "cabecalho.php";
    include "conexao.php";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

        if(!empty($_POST["pesquisa_cliente"])){
            $informacao = $_POST["pesquisa_cliente"];
            echo'
            <form action="" method="POST"  class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" id="pesquisa_cliente" name="pesquisa_cliente" placeholder="Pesquisar cliente" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal" type="submit">Pesquisar</button>
            </form>
        <br>
        
            <div class="tabela">
            <table border="1" class="table table-hover text-center"">
            <tr style="background-color: #00C5CD;">
                <td><b> Nome do Usuário </b></td>
                <td><b> Telefone/Celular </b></td>
                <td><b> Endereço </b></td>
                <td><b> Cidade </b></td>
                <td><b> Email </b></td>
            </tr>';
            $sql = "SELECT id_usuario, nome, telefone, endereco, cidade, email FROM usuario 
                WHERE nome LIKE '%$informacao%' OR telefone LIKE '%$informacao%'
            OR endereco LIKE '%$informacao%' OR cidade LIKE '%$informacao%' OR email LIKE '%$informacao%' ORDER BY nome";
            $result = mysqli_query($conexao,$sql);
        
            while($row = mysqli_fetch_assoc($result)){
                $clientes[] = $row;
                echo '
                <tr>
                    <td>'.$row["nome"].'</td>
                    <td>'.$row["telefone"].'</td>
                    <td>'.$row["endereco"].'</td>
                    <td>'.$row["cidade"].'</td>
                    <td>'.$row["email"].'</td>
                </tr>
                ';
                }
                echo'
                    </table>
                </div>
                <div class="row">
                    <a href="clientes.php" class="btn btn-info">Voltar</a>
                </div>
              ';
              ?>
          <script>
            // Limpar o campo após o processo
            document.getElementById('pesquisa_cliente').value='';
            window.location("clientes.php");
        </script>
        <?php
        }else{

        echo '
        <form action="" method="POST" class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" name="pesquisa_cliente" placeholder="Pesquisar cliente" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" data-toggle="modal" data-target="#modalDrywall" type="submit">Pesquisar</button>
        </form>
        <br>
        <div class="tabela">
            <table border="1" class="table table-hover text-center"">
            <tr style="background-color: #00C5CD;">
                <td><b> Nome do Usuário </b></td>
                <td><b> Telefone/Celular </b></td>
                <td><b> Endereço </b></td>
                <td><b> Cidade </b></td>
                <td><b> Email </b></td>
            </tr>';
            $sql = "SELECT nome, telefone, endereco, cidade, email FROM usuario ORDER BY nome";
            $result = mysqli_query($conexao,$sql);
        
            while($row = mysqli_fetch_assoc($result)){
                $clientes[] = $row;
                
            echo '
            <tr>
                <td>'.$row["nome"].'</td>
                <td>'.$row["telefone"].'</td>
                <td>'.$row["endereco"].'</td>
                <td>'.$row["cidade"].'</td>
                <td>'.$row["email"].'</td>
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