<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Cadastro de Serviço</title>
</head>

<body>
    <?php include_once '_parts/_header.php'; ?>

    <section class="container mt-3">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_GET, 'id')) {
            $servico = new Servico();
            $id = filter_input(INPUT_GET, 'id');
            $servicoEdit = $servico->buscar('idServico', $id);
        }
        if (filter_has_var(INPUT_GET, 'idDel')) {
            $servico = new Servico();
            $id = filter_input(INPUT_GET, 'idDel');
            $servico->deletar('idServico', $id);
        ?>
            <script>
                window.location.href = 'servicos.php';
            </script>
        <?php
        }
        if (filter_has_var(INPUT_POST, 'btnGravar')) {
            $servico = new Servico();
            $id = filter_input(INPUT_POST, 'txtId');
            $servico->setId($id);
            $servico->setNome(filter_input(INPUT_POST, 'txtNome'));
            $servico->setDescricao(filter_input(INPUT_POST, 'txtDescricao'));
            $servico->setPreco(filter_input(INPUT_POST, 'txtPreco'));
            if (empty($id)) {
                $servico->inserir();
            } else {
                $servico->atualizar('idServico', $id);
            }
            ?>
            <script>
                window.location.href = 'servicos.php';
            </script>
        <?php
        } else {
        ?>
            <div class="mt-3 col-4" style=" margin: 0 auto; width: 400px;">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="txtId" value="<?php echo isset($servicoEdit->idServico) ? $servicoEdit->idServico : null ?>">
                    <div class="form-group">
                        <label for="txtServico">Serviço</label>
                        <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Serviço" value="<?php echo isset($servicoEdit->nomeServico) ? $servicoEdit->nomeServico : null ?>">

                    </div>
                    <div class="form-group">
                        <label for="txtDescricao">Descrição</label>
                        <textarea name="txtDescricao" id="txtDescricao" class="form-control"><?php echo isset($servicoEdit->descricaoServico) ? $servicoEdit->descricaoServico : null ?></textarea>

                    </div>
                    <div class="form-group mb-3">
                        <label for="txtPreco">Preço</label>
                        <input type="text" class="form-control" id="txtPreco" name="txtPreco" placeholder="Preço" value="<?php echo isset($servicoEdit->precoServico) ? $servicoEdit->precoServico : null ?>">

                    </div>
                    <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>
                </form>
            </div>
        <?php
        }
        ?>
    </section>
    <?php include_once '_parts/_linkJS.php' ?>
</body>

</html>