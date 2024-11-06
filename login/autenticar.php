<?php

require_once("../conexao.php");
@session_start();

// Pegando o valor do atributo 'name' de cada input
$email = $_POST['email'];
$senha = $_POST['senha'];

// Realizando consulta
$query = $pdo -> prepare("SELECT * FROM usuarios WHERE email = :email and senha = :senha");

// Substituir valores das variáveis na consulta
$query -> bindValue(":email", $email);
$query -> bindValue(":senha", $senha);

$query -> execute();

$resultado = $query -> fetchAll(PDO::FETCH_ASSOC);
$totalRegistros = @count($resultado);




if ($totalRegistros > 0) {

    // Criar variáveis de sessão
    $_SESSION['nome_usuario'] = $resultado[0]['nome'];
    $_SESSION['nivel_usuario'] = $resultado[0]['nivel'];

    $nivel = $resultado[0]['nivel'];

    if ($nivel == 'Administrador') {
        echo "<script language='javascript'>window.location='painel-adm'</script>";
    } else if ($nivel == 'Cliente') {
        echo "<script language='javascript'>window.location='painel-cliente'</script>";
    } else {
        echo "<script language='javascript'>window.alert('Usuário sem permissão para acesso')</script>";
        echo "<script language='javascript'>window.location='index.php'</script>";
    }
    
} else {
    echo "<script language='javascript'>window.alert('Dados Incorretos')</script>";
    echo "<script language='javascript'>window.location='index.php'</script>";
}

?>