<?php

include_once('log.php');
include_once('functions.php');
date_default_timezone_set('America/Sao_Paulo');

$date = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

//$dir = "arquivos/"; 

$file = $_FILES["file"]; 
$file_name = $file["name"];

$unity = $_POST["select_unity"];
$option_file = $_POST["select_file"];

//Chamada da função url_and_dir, que define, com base na unidade e arquivo selecionados, qual será o diretório do arquivo a ser salvo e a url para envio do arquivo
$url_and_dir = url_and_dir($unity, $option_file);
$path = $url_and_dir["diretorio"].$file_name;

//localizar extensão do arquivo
$csv_ext = strstr($file_name, ".csv");
$txt_ext = strstr($file_name, ".txt");

//verifica se o arquivo é txt ou csv
if ($csv_ext == false && $txt_ext == false) {
    
    echo "Erro: Nome/extensão do arquivo diferente do padrão";
    
} else {

    if (move_uploaded_file($file["tmp_name"], $path)) { 
    
        //muda de csv para txt se necessário
        csv_to_txt($csv_ext, $file_name, $path);

        define('HEADER_TOKEN', 'authorization: Basic ' . base64_encode("58b8e07d-a3ea-4c76-97cd-5d4e903dd853:integracao") . '');
        define('HEADER_CACHE', 'cache-control: no-cache');
        define('HEADER_CONTENT', 'Content-Type:text/plain');
    
        $uploaded_file = file_get_contents($path); 
        
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url_and_dir["url"],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $uploaded_file,
            CURLOPT_HTTPHEADER => array(
                "" . HEADER_TOKEN . "",
                "" . HEADER_CACHE . "",
                "" . HEADER_CONTENT . ""
            ),
        ));
     
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
    
        if ($err) {
            echo $err;
            $level = "Erro";
            logs($date, $level, $ip, $err);
        } else {
            echo $response;
            $level = "Mensagem";
            logs($date, $level, $ip, $response);
        }

    } else { 
        echo "Erro: Arquivo não processado"; 
    }
    
    
}
