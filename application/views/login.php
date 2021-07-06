<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login</title>
</head>

<style>
    body {
        background-color: #BFE6EC;
    }

    div#formulario {
        background-color: #ECF0F1;
        padding: 2% 2% 2% 2%;
    }
</style>

<body>
    <div class="container vh-100">
        <form method="post" action="<?= base_url("login/validaLogin") ?>" class="row justify-content-center align-items-center h-100">
            <div class="col-md-4" id="formulario">
                <h3>Login</h3>
                <?= textCustom("error") ?>
                <?= textCustom("sucesso") ?>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="w-100 btn btn-primary">Entrar</button>
                <div class="text-center mt-3">
                    <a href="<?= base_url("Register") ?>">Cadastre-se</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>