<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Ordens de Serviço</title>
</head>

<body>
    <header>

    </header>
    <?php include_once '_parts/_header.php'; ?>
    <div class="container mt-3">
        <table class="table">
            <caption>Lista de serviços</caption>
            <thead class="table-secondary">
                <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });

                $ordem = new Ordem();
                foreach($ordem->OrdemCliente() as $key => $row) {
                ?>
                    <tr>
                        <td><?php echo $row->idOS ?></td>
                        <td><?php echo $row->nomeCliente ?></td>
                        <td><?php echo $row->dataOS ?></td>
                        <td><?php echo $row->totalOS ?></td>
                        <td></td>
                    </tr>
                    <?php
                }
                    ?>
            </tbody>
        </table>
        <a href="GerOrdem.php" class="btn btn-success btn-lg">
            <i class="bi bi-file-earmark"></i> Novo
        </a>
    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>

</html>