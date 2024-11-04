<?php

require_once("config.php");

date_default_timezone_set('America/Sao_Paulo');/* defininfo fuso-horário */

/* Conexão com Banco de Dados */
$pdo = new PDO("mysql:dbname=$banco; host=$servidor", "$usuario", "$senha");

try {
    
    $pdo = new PDO("mysql:dbname=sistema_adm; host=localhost", "root", "");
} 
catch (Exception $e) {
    echo "Erro de conexão" . "<p>". $e;
}
?>