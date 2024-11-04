<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1.0, initial-scale=1.0">
    <title>Contatos</title>

    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <div class="container">
            <form action="enviar.php" method="get">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                    <input type="name" name="nome" class="form-control" id="exampleFormControlInput1" placeholder="Seu nome">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Descreva sobre</label>
                    <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <input type="submit" class="btn btn-outline-danger" value="Salvar" >
            </form>
        </div>
    </section>
</body>

</html>