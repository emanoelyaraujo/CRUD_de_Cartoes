<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://unpkg.com/imask"></script>
    <title>Cadastro</title>
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
        <form method="post" action="<?= base_url("Home/$acao/" . (isset($cartao) ? $cartao->id : "")) ?>" class="row justify-content-center align-items-center h-100">
            <div class="col-md-4" id="formulario">
                <h3><?= $titulo ?></h3>
                <?= textCustom("error") ?>
                <?= textCustom("sucesso") ?>
                <div class="col-12">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" name="number" class="form-control" value="<?= (isset($cartao) ? $cartao->number : "") ?>" id="number" pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" required>
                    <?= textCustom("number") ?>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="date" class="form-label">Validade</label>
                        <input type="date" class="form-control" value="<?= (isset($cartao) ? $cartao->date : "") ?>" id="date" name="date" min="<?= date("Y-m-d") ?>" required>
                        <span class="validity"></span>
                        <?= textCustom("date") ?>
                    </div>
                    <div class="col">
                        <label for="cvv" class="form-label">Código de Verificação</label>
                        <input type="text" name="cvv" maxlength="3" class="form-control" value="<?= (isset($cartao) ? $cartao->cvv : "") ?>" id="cvv" required>
                        <?= textCustom("cvv") ?>
                    </div>
                </div>
                <a href="<?= base_url("Home") ?>" class="btn btn-outline-secondary mt-4">Voltar</a>
                <button type="submit" class="btn btn-<?= $cor ?> mt-4"><?= $botao ?></button>
            </div>
        </form>
    </div>
</body>

<script>
    let numberMask = IMask(
        document.getElementById('number'), {
            mask: "0000 0000 0000 0000",
        });

    let codMask = IMask(
        document.getElementById('cvv'), {
            mask: "000",
        })
</script>

</html>