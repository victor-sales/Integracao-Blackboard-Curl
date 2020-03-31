<?php

    require_once('functions.php');

    $date = date('Y-m-d H:i:s');

    $db = 'mysql:host=localhost;dbname=integracao_bb';
    $user = 'root';
    $password = '';
    
    try {
        $conn = new PDO($db, $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $response = ($date . ' Conexão realizada com sucesso ' . "\r\n");
        logConectaDb($response);
        
    } catch (PDOException $e) {
        $err = $date . ' Erro: ' . $e->getMessage() . "\r\n";
        logConectaDb($err);
    }
    

?>