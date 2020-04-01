<?php

function url_and_dir($unity, $option_file) {

    switch ($unity) {
        case 'fun_moc':
            $url = "https://unisantanna-test.blackboard.com/webapps/bb-data-integration-flatfile-BB5bfc25366f037/endpoint/$option_file/store";
            $dir = "arquivos/funorte_moc/";
            break;
    
        default:
            echo 'Erro: A unidade seleciona é inválida. Operação cancelada';
            return false;
    }

    return array(
        "url" => $url, 
        "diretorio" => $dir
    );
}

//--------------------------------------------------------------------------------------------------------------------------------

function csv_to_txt($csv_ext, $file_name, $path) {

    $string = "";
    $arquivo = fopen($path, 'r+'); 

    if ($arquivo) { 
        while(true) { 
        $linha = fgets($arquivo); 
            
            if ($linha==null) {
                break; 
            }
             
            if (stristr($linha, ",")) { 
                $string .= str_replace(",", "|", $linha);

            } else {
                $string .= $linha; 

            } 
        }

        rewind($arquivo); 
        
        if (!fwrite($arquivo, $string)){                
            die ('Não foi possível enviar o arquivo');  

        } else {

            if ($csv_ext) {

                $csv_to_txt = substr_replace($file_name, ".txt", strpos($file_name, ".csv"));
                $file_name = $csv_to_txt;
            }
        }

        fclose($arquivo); 
    } 

    return $file_name;
}


?>