<?php

function url_and_dir($unity, $option_file)
{

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

function comma_to_pipe($path)
{

    $string = "";
    $arquivo = fopen($path, 'r+');

    if ($arquivo) {
        while (true) {
            $linha = fgets($arquivo);

            if ($linha == null) {
                break;
            }

            if (stristr($linha, ",")) {
                $string .= str_replace(",", "|", $linha);
            } else {
                $string .= $linha;
            }
        }

        rewind($arquivo);

        if (!fwrite($arquivo, $string)) {
            die('Erro: Não foi possível enviar o arquivo');
        } //else {

        //     if ($csv_ext) {

        //         $csv_to_txt = substr_replace($file_name, ".txt", strpos($file_name, ".csv"));
        //         $file_name = $csv_to_txt;
        //     }
        // }

        fclose($arquivo);
    }
}

//--------------------------------------------------------------------------------------------------------------------------------

function validate_email($path)
{

    $arquivo = fopen($path, 'r');
    $result = array();
    $find_email = array();
    $emails = "";
    $msg = "";

    while (!feof($arquivo)) {
        $result[] = explode("|", fgets($arquivo));
    }

    fclose($arquivo);

    foreach ($result as $linha) {

        $posicao = array_search('email', $linha);
        if ($posicao) {
            $find_email = array_column($result, $posicao);
            break;
        }
        else {
            return false;
        } 
    }

    for ($i = 1; $i < count($find_email); $i++) {

        if (filter_var($find_email[$i], FILTER_VALIDATE_EMAIL)) {
        } else {
            $emails = $emails . " " . $find_email[$i];
        }
    }

    if ($emails == "") {
        return false;
    } else {
        $msg_erro_email = "Os email de " . $emails . " contem erros. Estes alunos foram cadastrados com o campo de email vazio";
        return $msg_erro_email;
    }
    
}
