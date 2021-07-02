<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Dados do Usuário</title>
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
        <form method="post" action="<?= base_url("Navbar/atualizaUsuario") ?>" class="row justify-content-center align-items-center h-100">
            <div class="col-md-4" id="formulario">
                <h3>Editar Usuário</h3>
                <div class="col mb-2">
                    <label for="first_name" class="form-label">Nome</label>
                    <input type="text" name="first_name" class="form-control" value="<?= $usuario->first_name ?>" id="first_name" autofocus required>
                    <div class="form-text text-danger"><?= $this->session->flashdata('first_name'); ?></div>
                </div>
                <div class="col-12 mb-2">
                    <label for="last_name" class="form-label">Sobrenome</label>
                    <input type="text" name="last_name" class="form-control" value="<?= $usuario->last_name ?>" id="last_name" required>
                    <div class="form-text text-danger"><?= $this->session->flashdata('last_name'); ?></div>
                </div>
                <div class="col-12 mb-2">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" value="<?= $usuario->email ?>" id="email" required>
                    <div class="form-text text-danger"><?= $this->session->flashdata('email'); ?></div>
                </div>
                <div class="col-12 mb-2">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" value="" id="password">
                    <div class="form-text text-danger"><?= $this->session->flashdata('password'); ?></div>
                </div>
                <div class="col-12 mb-2">
                    <label for="confirm_password" class="form-label">Confirmação da Senha</label>
                    <input type="password" name="confirm_password" class="form-control" value="" id="confirm_password">
                    <div class="form-text text-danger"><?= $this->session->flashdata('confirm_password'); ?></div>
                </div>
                <a href="<?= base_url("Home") ?>" class="btn btn-outline-secondary mt-4">Voltar</a>
                <button type="submit" class="btn btn-warning mt-4">Editar</button>
            </div>
        </form>
    </div>

</body>

</html>