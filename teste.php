<?php
include_once('curl.php');
include_once('log.php');
include_once('functions.php');


$teste = validate_email($path);

$level = "Atencao";

logs($date, $level, $ip, $teste);
