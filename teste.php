<?php
    $caminho = 'arquivos\funorte_moc\person.txt';
    $arquivo = fopen ($caminho, 'r');
    $result = array();
    
    while(!feof($arquivo)){
        $result[] = explode("|",fgets($arquivo));
    }

    $num_linhas = count(file($caminho));
    fclose($arquivo);

    for ($i = 0; $i <= $num_linhas; $i++) {
        for ($j = 0; $j <= 10; $j++) { 
            echo $result[$i][$j] . " ";
        } 
        echo '<br>';       
    }
    
    
?>