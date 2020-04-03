<?php
    $caminho = 'arquivos\funorte_moc\person.txt';
    $arquivo = fopen ($caminho, 'r');
    $result = array();
    $contador = 0;

    while(!feof($arquivo)){
        $result[] = explode("|", fgets($arquivo));
    }

    $num_linhas = count(file($caminho));    
    fclose($arquivo);

    foreach ($result as $linha) {
        
        $find_email = array_column($result, array_search('email', $linha));
        
        if ($find_email == true) {
            for ($i=1; $i <= count($find_email); $i++) { 
                
                if (filter_var($find_email[$i], FILTER_VALIDATE_EMAIL) == false) {    
                    $contador = $contador + 1;
                    echo 'teste';
                } 
            }
        }
    }
    
    echo $contador;
    
    
    
?>