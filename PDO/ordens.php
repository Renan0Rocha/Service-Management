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
            <caption>Lista de Ordens de Serviços</caption>
            <thead class="table-secondary">
                <tr>
                    <th>Código</th>
                    <th>Data</th>
                    <th>Id do Cliente</th>
                    <th>Valor</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });

                $ordem = new OrdemServico();
                foreach($ordem->listar() as $key => $row){  
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row->idOS; ?></td>
                        <td><?php echo $row->dataOS; ?></td>
                        <td><?php echo $row->idCliente; ?></td>
                        <td><?php echo $row->totalOS; ?></td>
                        <td><?php echo $row->descontoOS; ?></td>
                        <td>
                            <a href="GerOrdem.php?id=<?php echo $row->idOS?>" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="GerOrdem.php?idDel=<?php echo $row->idOS?>" class="btn btn-danger" onclick= "return confirm('Deseja excluir a Ordem Serviço?')">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                            
                        </td>
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
    <script src="js/script.js"></script>
    <?php include '_parts/_linkJS.php'; ?>
</body>

</html>