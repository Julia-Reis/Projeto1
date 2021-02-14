<?php
    define('HOST', '85.10.205.173');
    define('USUARIO', 'juliareis');
    define('SENHA', 'abracadabra');
    define('DB', 'reisdogesso');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar! Cheque as informações.');
?>
