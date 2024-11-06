<?php 

@session_start();

echo 'Painel Administrativo <p>';

echo 'Nome Usuário: ' . $_SESSION['nome_usuario'] . 'e o nível do usuário é '. $_SESSION['nivel_usuario'];
?>

<a href="../logout.php">Sair</a>



