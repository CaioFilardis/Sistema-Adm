<?php
/* recebe o conteúdo do formulário POST */
$nome = $_POST['nome']; 
$email = $_POST['email'];
$texto = $_POST['texto'];
$assunto = 'Email do Site';
$remetente = 'caio.filardis@hotmail.com';

$conteudo = utf8_decode('Nome: '.$nome. "\r\n"."\r\n".
                        'Email: '.$email. "\r\n"."\r\n". 'Mensagem: '.$texto); 

$cabecalho = 'From: '.$email;


@mail($remetente, $assunto, $texto, $cabecalho);
?>