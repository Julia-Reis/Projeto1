<?php
include "fpdf/fpdf.php";
include "conexao.php";

if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
    session_start();
  }	

  $codigo_busca = $_SESSION["codigo_busca"];

define('DATABASE',array('HOST'=>'85.10.205.173','DB'=>'reisdogesso','USER'=>'juliareis','PASSWORD'=>'abracadabra'));

try{
    $pdo = new PDO("mysql:host=".DATABASE['HOST'].";dbname=".DATABASE['DB'],DATABASE['USER'],DATABASE['PASSWORD'],
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);        
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $sql = "SELECT * FROM orcamento_item WHERE cod_orcamento = '$codigo_busca'";
    $col = 40;
    $lin = 10;
    $pdf->Ln(5);
    $pdf->Cell(90,10,utf8_decode("Reis do Gesso"), 0, 0, "C");
    $pdf->Cell(100,10,utf8_decode("Orçamento - N° $codigo_busca"), 0, 0, "C");
    $pdf->Ln(10);
    // Cabecalho PDF
    $pdf->Image('img/favicon.png',10,10,-700);
    $pdf->Ln(10);
    $pdf->Cell(70,10, utf8_decode("Serviço"), 1, 0, "C");
    $pdf->Cell($col,$lin, utf8_decode("Metros"), 1, 0, "C");
    $pdf->Cell($col,$lin, utf8_decode("Preço metro"), 1, 0, "C");
    $pdf->Cell($col,$lin, utf8_decode("Valor serviço"), 1, 0, "C");
    $pdf->Ln(10);
    foreach ($pdo->query($sql) as $row) {
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(70,10, $row['nome_servico'], 1, 0, "C");
        $pdf->Cell($col,$lin, $row['metragem'], 1, 0, "C");
        $pdf->Cell($col,$lin, $row['preco_metro'], 1, 0, "C");
        $pdf->Cell($col,$lin, $row['preco_total'], 1, 0, "C");
        $pdf->Ln(10);
    }
    $pdf->Ln(10);
    $sql_valor_final = "SELECT valor_orcamento FROM orcamento WHERE id_orcamento = '$codigo_busca'";
    foreach ($pdo->query($sql_valor_final) as $linha){
        $pdf->Cell(190,10, "Valor total: R$ " .$linha['valor_orcamento'], 0, 0, "C");
    }
    $pdf->Output();
}catch(Exception $e){
    echo $e->getMessage();
}
?>
