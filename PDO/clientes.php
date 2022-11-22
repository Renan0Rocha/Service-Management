<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Usuários</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>
    <div class="container mt-3">
        <table class="table">
            <caption>Lista de Clientes</caption>
            <thead class="table-secondary">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });

                $cliente = new Cliente();
                foreach ($cliente->listar() as $key=>$row) {
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row->idCliente; ?></td>
                        <td><?php echo $row->nomeCliente; ?></td>
                        <td><?php echo $row->telefoneCliente; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($row->nascimentoCliente)); ?></td>
                        <td>
                            <a href="GerCliente.php?id=<?php echo $row->idCliente?>" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="GerCliente.php?idDel=<?php echo $row->idCliente?>" class="btn btn-danger" onclick= "return confirm('Deseja excluir o Serviço <?php echo $row->nomeServico; ?> ?')">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="GerCliente.php" class="btn btn-success btn-lg">
            <i class="bi bi-file-earmark"></i> Novo
        </a>
    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>

</html>