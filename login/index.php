<?php 
    require_once("../conexao.php");
?>

<!-- Links -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="../css/estilo.css">

<!-- Scripts -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Insera seu login</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="autenticar.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuário:</label><br>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Inserir Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="pasword" name="senha" id="password" class="form-control" placeholder="Inserir Senha" required>
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span></span> <span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Enviar" id="enviar">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="#" class="text-info" data-bs-toggle="modal" data-bs-target="#modaCadastrar">Cadastre-se</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Modal  Cadastre-se -->
<div class="modal" tabindex="-1" id="modaCadastrar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastre-se</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><!-- modal-header -->
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nomeCad" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailCad" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Senha</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="senhaCad" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="btn-cadastrar">Registrar</button>
                    </div><!-- modal-footer -->
                </form>
            </div><!-- modal-body -->

        </div><!-- modal-content -->
    </div><!-- odal-dialog -->
</div><!-- modal -->

<?php 

if (isset($_POST['btn-cadastrar'])) {

    $query = $pdo -> prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
    $query -> bindValue(":nome", $_POST['nomeCad']);
    $query -> bindValue(":email", $_POST['emailCad']);
    $query -> bindValue(":senha", $_POST['senhaCad']);
    $query -> bindValue(":nivel", 'Cliente');
    $query -> execute();

    echo "<script language='javascript'>window.alert('Cadastrado com sucesso')</script>";

}
?>