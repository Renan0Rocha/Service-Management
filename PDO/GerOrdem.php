<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Nova Ordem</title>
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
                $ordem = new OrdemServico();
                $id = filter_input(INPUT_GET, 'id');
                $ordemEdit = $ordem->buscar('idOS', $id);
            }
            if (filter_has_var(INPUT_GET, 'idDel')) {
                $ordem = new OrdemServico();
                $id = filter_input(INPUT_GET, 'idDel');
                $ordem->deletar('idOS', $id);
            
            ?>
                <script>
                    window.location.href = 'ordens.php';
                </script>
            <?php
            }
            if (filter_has_var(INPUT_POST, 'btnGravar')) {
                $ordem = new OrdemServico();
                $id = filter_input(INPUT_POST, 'txtNumero');
                $ordem->setId($id);
                $ordem->setData(filter_input(INPUT_POST, 'txtData'));
                $ordem->setCliente(filter_input(INPUT_POST, 'sltCliente'));
                $ordem->setTotalOS(filter_input(INPUT_POST, 'txtTotal'));
                $ordem->setDescontosOS(filter_input(INPUT_POST, 'txtDesconto'));
                if (empty($id)) {
                    $ordem->inserir();
                } else $ordem->atualizar('idOS', $id);

            ?>
                <script>
                    window.location.href = 'ordens.php';
                </script>
            <?php
            } else{
            ?>

            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <label for="txtNumero" class="form-label">N° Ordem de Serviço</label>
                        <input type="text" name="txtNumero" id="txtNumero" class="form-control" value="<?php echo isset($ordemEdit->idOS) ? $ordemEdit->idOS : null ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="txtData" class="form-label">Data</label>
                        <input type="date" name="txtData" id="txtData" value="<?php echo date('Y-n-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="sltCliente" class="form-label">Cliente</label>
                        <select name="sltCliente" id="sltCliente" class="form-select">
                            <?php
                            $cliente = new Cliente();
                            foreach ($cliente->listaUnico('nomeCliente', 'idCliente') as $key => $row) {
                            ?>
                                <option value="<?php echo $row->idCliente ?>"><?php echo $row->nomeCliente ?></option>
                            <?php
                            };
                            ?>
                            ?>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="txtTotal">Total</label>
                    <input type="text" class="form-control" id="txtTotal" name="txtTotal" placeholder="Total" value="<?php echo isset($ordemEdit->totalOS) ? $ordemEdit->totalOS : null ?>">

                </div>
                <div>
                    <label for="txtDescont">Desconto</label>
                    <textarea name="txtDesconto" id="txtDesconto" class="form-control" placeholder="Descont"><?php echo isset($ordemEdit->descontoOS) ? $ordemEdit->descontoOS : null ?></textarea>

                </div>
                <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>                
            </form>
        <?php
        }
        ?>
        </section>
    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>

</html>