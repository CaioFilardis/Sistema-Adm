<?php


require_once("../../conexao.php");
@session_start();

// Verificar se o usuário logado é um administrador
if (@$_SESSION['nivel_usuario'] != 'Administrador') {
    echo "<script language='javascript'>window.location='../index.php'</script>";
}

/* echo 'Painel Administrativo <p>';

echo 'Nome Usuário: ' . $_SESSION['nome_usuario'] . 'e o nível do usuário é '. $_SESSION['nivel_usuario']; */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Uusários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sair
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><?php echo $_SESSION['nome_usuario']; ?></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php">Sair</a></li>
                        </ul>
                    </li>
                </ul>
                <form method="GET" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="txtBuscar">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </form><!-- d-flex -->
            </div><!-- collapse -->
        </div><!-- container-fluid -->
    </nav>

    <div class="container">
        <button class="btn btn-success mt-4 mb-4" type="button" data-bs-toggle="modal" data-bs-target="#modalCadastrar">Novo usuário</button>
        <?php

        $query = $pdo->query("SELECT * FROM usuarios"); // Apenas consulta
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $totalRegistros = @count($resultado);

        if ($totalRegistros > 0) {

        ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Nivel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // para contagem definida
                    for ($i = 0; $i < $totalRegistros; $i++) {
                        foreach ($resultado[$i] as $key => $value) {
                        }
                        $nome = $resultado[$i]['nome'];
                        $email = $resultado[$i]['email'];
                        $senha = $resultado[$i]['senha'];
                        $nivel = $resultado[$i]['nivel'];

                    ?>

                        <!-- Tabela -->
                        <tr>
                            <td><?php echo $nome ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $senha ?></td>
                            <td><?php echo $nivel ?></td>

                        </tr>


                <?php
                    }
                } else {
                    echo '<br>' . '<p>Não existem dados a serem exibidos</p>';
                }
                ?>


                </tbody>
            </table>
    </div>

</body>

</html>

<!-- Modal Cadastrar -->
<div class="modal fade" id="modalCadastrar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nomeCad" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailCad" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="senhaCad" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label mb-2">Nivel</label>
                        <select class="form-select" aria-label="Default select example" name="nivelCad">
                            <option value="Cliente">Cliente</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="TI">TI</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="btn-cadastrar">Registrar</button>
                    </div><!-- modal-footer -->

                </div>
            </form>
        </div>
    </div>
</div><!-- Modal cadastrar -->

<?php

if (isset($_POST['btn-cadastrar'])) {


    $queryVerificar = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");

    $queryVerificar->bindValue(":email", $_POST['emailCad']);

    $queryVerificar->execute();

    $resultadoVerificar = $queryVerificar -> fetchAll(PDO::FETCH_ASSOC);
    $totalRegistrosVerificar = @count($resultadoVerificar);

    


    $query = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
    $query->bindValue(":nome", $_POST['nomeCad']);
    $query->bindValue(":email", $_POST['emailCad']);
    $query->bindValue(":senha", $_POST['senhaCad']);
    $query->bindValue(":nivel", $_POST['nivelCad']);
    $query->execute();

    echo "<script language='javascript'>window.alert('Cadastrado com sucesso')</script>";
    echo "<script language='javascript'>window.location='index.php'</script>";
}
?>