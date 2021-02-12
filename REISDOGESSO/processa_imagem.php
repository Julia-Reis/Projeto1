<?php
    include "conexao.php";
		$cod_servico = $_POST["cod_servico"];
    	$nome_arquivo = @date("Ymdhis").$_FILES["arquivo"]["name"];
		$local = "img/fotos/".$nome_arquivo;
		// tira o arquivo da pasta temporaria e passa para a pasta definitiva
		if(move_uploaded_file($_FILES["arquivo"]["tmp_name"], $local)){
			$upload = true;
		}
		else{
			$upload = false;
        }
        
        $foto = $nome_arquivo;

        $insert = "INSERT INTO imagens_servico(arquivo, cod_servico) VALUES ('$foto', '$cod_servico')";
		 
		$conexao->query($insert);

		$select = "SELECT * FROM imagens_servico ORDER BY arquivo";

		$resultado = $conexao->query($select);
		echo '
		<script>
        window.alert("Imagem cadastrada com sucesso!");
            window.location.href = "http://localhost/Furquim/Projeto%20Final/REISDOGESSO/index.php";
        </script>
		';
		$cod_servico = NULL;
		foreach($resultado as $linha){
			$tabela[] = $linha;
		} 
?>