<?php
    define('HOST', 'mysql380.umbler.com');
    define('USUARIO', 'juliareis');
    define('SENHA', 'abracadabra');
    define('DB', 'reisdogesso');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar! Cheque as informações.');
?>
