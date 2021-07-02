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
        <form method="post" action="<?= base_url("register/insereUsuario") ?>" class="row justify-content-center align-items-center h-100">
            <div class="col-md-4" id="formulario">
                <h3>Cadastre-se</h3>
                <?= textCustom("error") ?>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Nome</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" maxlength="50" autofocus required>
                    <?= textCustom("first_name") ?>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Sobrenome</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" maxlength="50" required>
                    <?= textCustom("last_name") ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" maxlength="50" id="email" required>
                    <?= textCustom("email") ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" minlength="6" maxlength="15" id="password" required>
                    <?= textCustom("password") ?>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="<?= base_url("Login") ?>" class="">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>