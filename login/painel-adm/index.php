<?php 

@session_start();

// Verificar se o usuário logado é um administrador
if (@$_SESSION['nivel_usuario'] != 'Administrador') {
    echo "<script language='javascript'>window.location='../index.php'</script>";
}

echo 'Painel Administrativo <p>';

echo 'Nome Usuário: ' . $_SESSION['nome_usuario'] . 'e o nível do usuário é '. $_SESSION['nivel_usuario'];
?>

<a href="../logout.php">Sair</a>



