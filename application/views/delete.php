<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Encerrar sessão</title>
</head>

<style>
    body {
        background-color: #BFE6EC;
    }

    .row {
        background-color: #ECF0F1;
        padding: 2% 2% 2% 2%;
    }
</style>

<body>
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center">
            <h2>Certeza que deseja encerrar a sessão?</h2>
            <div>
                <a href="<?= base_url("Navbar/deletaUsuario") ?>" class="btn btn-danger" href="">Sim</a>
                <a href="<?= base_url("Home") ?>" class="btn btn-primary" href="">Não</a>
            </div>

        </div>
    </div>
</body>

</html>