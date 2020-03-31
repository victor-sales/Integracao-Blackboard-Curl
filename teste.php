<?php 
// abre o arquivo colocando o ponteiro de escrita no final 
$arquivo = fopen('meuarquivo.txt','r+'); 
if ($arquivo) { 
    while(true) { 
        $linha = fgets($arquivo); 
        if ($linha==null) break; 
        
        // busca na linha atual o conteudo que vai ser alterado
        if(preg_match("/José da Silva:/", $linha)) { 
            $string .= str_replace("José da Silva: 27 anos", "José da Silva: 28 anos", $linha); 
        } else { 
        // vai colocando tudo numa nova string 
            $string.= $linha; 
        } 
    } 

    // move o ponteiro para o inicio pois o ftruncate() nao fara isso 
    rewind($arquivo); 
    // truca o arquivo apagando tudo dentro dele 
    ftruncate($arquivo, 0); 
    // reescreve o conteudo dentro do arquivo 
    if (!fwrite($arquivo, $string)) die('Não foi possível atualizar o arquivo.'); echo 'Arquivo atualizado com sucesso'; fclose($arquivo);
} 
    
?>