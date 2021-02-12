<?php
    include "cabecalho.php";
    include "conexao.php";

    $codigo_busca = mysqli_real_escape_string($conexao, trim($_POST['codigo_busca']));
    $_SESSION["codigo_busca"] = $codigo_busca;
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';


echo '
<div class="tabela">
    <table border="1" class="table table-hover text-center"">
    <tr style="background-color: #00C5CD;">
        <td> Nome do Serviço </td>
        <td> Preço por metro </td>
        <td> Metros requisitados </td>
        <td> Valor Final </td>
    </tr>';
    $cod_usuario = $_SESSION["id_usuario"];
    $sql = "SELECT * FROM orcamento_item WHERE cod_orcamento = '$codigo_busca' ORDER BY nome_servico ASC";
    $result = mysqli_query($conexao,$sql);

    while($row = mysqli_fetch_assoc($result)){
        $orcamentos[] = $row;
        
    echo '
    <tr>
        <td>'.$row["nome_servico"].'</td>
        <td>'.$row["preco_metro"].'</td>
        <td>'.$row["metragem"].'</td>
        <td>'.$row["preco_total"].'</td>
    </tr>
    ';
    }
    echo'
        </table>
        <a href="gerar_pdf.php" class="btn btn-primary">Gerar PDF</a>
    </div>
  ';

include "rodape.php";
?>