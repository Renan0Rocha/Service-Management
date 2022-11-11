<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Novo Cliente</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>
    <div class="container mt-3">

    <section class="container mt-3">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_GET, 'id')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_GET, 'id');
            $clienteEdit = $cliente->buscar('idCliente', $id);
        }
        if (filter_has_var(INPUT_GET, 'idDel')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_GET, 'idDel');
            $cliente->deletar('idCliente', $id);
        ?>
            <script>
                window.location.href = 'clientes.php';
            </script>
        <?php
        }
        if (filter_has_var(INPUT_POST, 'btnGravar')) {
            $cliente = new Cliente();
            $id = filter_input(INPUT_POST, 'txtId');
            $cliente->setId($id);
            $cliente->setNome(filter_input(INPUT_POST, 'txtNome'));
            $cliente->setEndereco(filter_input(INPUT_POST, 'txtEndereco'));
            $cliente->setTelefone(filter_input(INPUT_POST, 'txtTelefone'));
            $cliente->setNascimento(filter_input(INPUT_POST, 'txtNascimento'));
            $cliente->setBairro(filter_input(INPUT_POST, 'txtBairro'));
            $cliente->setCidade(filter_input(INPUT_POST, 'txtCidade'));
            $cliente->setEstado(filter_input(INPUT_POST, 'txtEstado'));
            if (empty($id)) {
                $cliente->inserir();
            } else {
                $cliente->atualizar('idCliente', $id);
            }
        ?>
            <script>
                window.location.href = 'clientes.php';
            </script>
        <?php
        } else {
        ?>
            <div class="mt-3 col-4" style=" margin: 0 auto; width: 400px;">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="txtId" value="<?php echo isset($ClienteEdit->idCliente) ? $clienteEdit->idCliente : null ?>">
                    <div class="form-group">
                        <label for="txtCliente">Cliente</label>
                        <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Cliente" value="<?php echo isset($clienteEdit->nomeCliente) ? $clienteEdit->nomeCliente: null ?>">

                    </div>
                    <div class="form-group">
                        <label for="txtEndereco">Endereço</label>
                        <textarea name="txtEndereco" id="txtEndereco" class="form-control"><?php echo isset($clienteEdit->enderecoCliente) ? $clienteEdit->enderecoCliente : null ?></textarea>

                    </div>
                    <div class="form-group mb-3">
                        <label for="txtTelefone">Telefone</label>
                        <input type="text" class="form-control" id="txtTelefone" name="txtTelefone" placeholder="Telefone" value="<?php echo isset($clienteEdit->telefoneCliente) ? $clienteEdit->telefoneCliente : null ?>">

                    </div>
                    <div class="form-group mb-3">
                        <label for="txtNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="txtNascimento" name="txtNascimento" placeholder="Data de Nascimento" value="<?php echo isset($clienteEdit->nascimentoCliente) ? $clienteEdit->nascimentoCliente : null ?>">

                    </div>
                    <div class="form-group mb-3">
                        <label for="txtBairro">Bairro</label>
                        <input type="text" class="form-control" id="txtBairro" name="txtBairro" placeholder="Bairro" value="<?php echo isset($clienteEdit->bairroCliente) ? $clienteEdit->bairroCliente : null ?>">

                    </div>
                    <div class="form-group mb-3">
                        <label for="txtCidade">Cidade</label>
                        <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade" value="<?php echo isset($clienteEdit->cidadeCliente) ? $clienteEdit->cidadeCliente : null ?>">

                    </div>
                    <div class="form-group mb-3">
                        <label for="txtEstado">Estado</label>
                        <input type="text" class="form-control" id="txtEstado" name="txtEstado" placeholder="Estado" value="<?php echo isset($clienteEdit->estadoCliente) ? $clienteEdit->estadoCliente : null ?>">

                    </div>
                    <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>
                </form>
            </div>
        <?php
        }
        ?>
    </section>

    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>
</html>