<?php
    include "cabecalho.php";
    require_once "conexao.php";

    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<br>";
    echo"<br>";

    if (!isset($_SESSION)) {   //Verificar se a sessão não já está aberta.
		  session_start();
    }	
    
    $cod_usuario = $_SESSION["id_usuario"];

    print_r($_POST["total_campos"]);

    for($i=1; $i <= $_POST["total_campos"]; $i++){
      if($_POST["metros$i"] != '' || $_POST["cod_servico$i"] != ''){
     $_SESSION["todos_metros"][$i] = $_POST["metros$i"];
     $_SESSION["todos_servicos"][$i] = $_POST["cod_servico$i"];

     
      echo("<br>");
      }else{
        echo "tem coisa vazia na sessão";
      }
    }
    // print_r($_SESSION["todos_metros"]);


    $total = 0;
    $contador = 1;
    for($i=1; $i <= sizeof($_SESSION["todos_servicos"]); $i++){
        $cod_servico = $_SESSION["todos_servicos"][$i];
        
        $query = "SELECT nome, preco FROM servico WHERE id_servico = '$cod_servico'";

        $result = mysqli_query($conexao, $query);

        $row = mysqli_fetch_assoc($result);
        
        $preco_total = $row["preco"] * $_SESSION["todos_metros"][$i];
        
        $nome_servico = $row["nome"];
        $preco_metro = $row["preco"];
        $metragem = $_SESSION["todos_metros"][$i];

        require_once "conexao.php";
        $cod_usuario = $_SESSION["id_usuario"];
        $data_orcamento = '2021-02-05 21:53';
        $situacao = 0;
        //$observacao = NULL;
        
        if($contador < 2){
        $insert_orcamento = "INSERT INTO orcamento(cod_usuario, data_orcamento, situacao)
            VALUES('$cod_usuario', '$data_orcamento','$situacao')";
          $conexao->query($insert_orcamento);
        //$resultado_orcamento = mysqli_query($conexao, $insert_orcamento);
        $contador++;
       //$linha_orcamento = mysqli_fetch_assoc($resultado_orcamento);
        }
          $select_max = "SELECT MAX(id_orcamento) AS 'id_orcamento' FROM orcamento";
          $resultado_max = mysqli_query($conexao, $select_max);
          while($linha_resultado_max = mysqli_fetch_assoc($resultado_max)){
              $max = $linha_resultado_max["id_orcamento"];
          }
          $cod_orcamento = $max;

        $insert_orcamento_item = "INSERT INTO orcamento_item(cod_orcamento, cod_servico, nome_servico, preco_metro, 
          metragem, preco_total)
            VALUES('$cod_orcamento', '$cod_servico', '$nome_servico', '$preco_metro', '$metragem', '$preco_total')";
        $resultado_orcamento_item = mysqli_query($conexao, $insert_orcamento_item);
        //$linha_orcamento_item = mysqli_fetch_assoc($resultado_orcamento_item);
        
        $select_valor_total = "UPDATE orcamento SET valor_orcamento = (SELECT SUM(preco_total) FROM orcamento_item WHERE cod_orcamento = $cod_orcamento) WHERE id_orcamento =  $cod_orcamento";
        $resultado_select_valor_total = mysqli_query($conexao, $select_valor_total);

        $total = $total + $preco_total; 
          $metros = 0;
          $preco_total = 0;
        
  }
  //print_r($total);
    $_SESSION["todos_metros"] = NULL;
    $_SESSION["todos_servicos"] = null;
    //echo $total;
    /*
    echo '
    <script>
      window.alert("Orcçamento calculado com sucesso!");
      window.location.href = "http://localhost/Furquim/Projeto%20Final/REISDOGESSO/meus_orcamentos.php";
    </script>';
*/

    include "rodape.php";
?>