<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CDN FONT -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Home</title>
</head>

<style>
    /* body {
        background-color: #BFE6EC; 
    } */
    #edit {
        text-decoration: none;
        color: #fff;
    }
</style>

<body>
    <div class="container mt-4">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <a href="<?= base_url("Navbar") ?>" id="edit"><i class="fas fa-user-edit"></i>Editar dados do usuário</a>
            </div>
            <div class="bg-dark px-4 pb-4">
                <a href="<?= base_url("Navbar/chamaView") ?>" id="edit"><i class="fas fa-user-times"></i>Encerrar sessão</a>
            </div>
            <div class="bg-dark px-4 pb-4">
                <a href="<?= base_url("Login/logout") ?>" id="edit"><i class="fas fa-sign-out-alt"></i>Sair</a>
            </div>
        </div>

        <!-- mensagem de sucesso -->
        <?php
        if ($this->session->flashdata("sucesso"))
        {
        ?>
            <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
                <strong>Sucesso!</strong> <?= $this->session->flashdata("sucesso") ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        else if ($this->session->flashdata("error"))
        {
        ?>
            <div class="alert alert-success alert-dismissible fade show mt-3 mb-3" role="alert">
                <strong>Erro!</strong> <?= $this->session->flashdata("error") ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>

        <h3>Tabela de Cartões de Crédito</h3>
        <div>
            <a href="<?= base_url("Home/inserir") ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Novo Cartão</a>
        </div>
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Número</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $values)
                {
                ?>
                    <tr>
                        <th scope="row"><?= $values->id ?></th>
                        <td><?= $values->first_name . " " . $values->last_name ?></td>
                        <td><?= wordwrap($values->number, 4, " ", true) ?></td>
                        <td><?= date("d/m/Y", strtotime($values->date)) ?></td>
                        <td>
                            <a href="<?= base_url("Home/alterar/$values->id") ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar</a>
                            <a href="<?= base_url("Home/deletar/$values->id") ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>Excluir</a>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>