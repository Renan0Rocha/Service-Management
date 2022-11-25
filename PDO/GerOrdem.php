<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php' ?>
    <title>Nova Ordem de Serviço</title>
</head>

<body>
    <?php include '_parts/_header.php' ?>
    <div class="container mt-3">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_POST, 'btnGravar')) {
            $ordem = new Ordem();
            $id = filter_input(INPUT_POST, 'txtId');
            $ordem->setId($id);
            $ordem->setData(filter_input(INPUT_POST, 'txtData'));
            $ordem->setCliente(filter_input(INPUT_POST, 'sltCliente'));
            $ordem->setDesconto(filter_input(INPUT_POST, 'txtDesconto'));
            $ordem->setTotal(filter_input(INPUT_POST, 'txtTotal'));
            $servidosID = $_POST["idServ"];
            $servidosQtde = $_POST["qtdeServ"];
            $servidosValor = $_POST["valorServ"];
             if (empty($id)) {
                $idOS = $ordem->inserir();

                 foreach($servidosID as $key => $row){
                    $item = new Item();
                    $item->setIdOs($idOS);
                    $item->setIdServico($servidosID[$key]);
                    $item->setQuantidadeIOS($servidosQtde[$key]);
                    $item->setValorServico($servidosValor[$key]);
                    $item->inserir();
                 }
             }
            ?>
            <script>
                window.location.href = 'ordens.php';
            </script>
        <?php
        }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="formOS">
            <div class="row">
                <div class="col-md-2">
                    <label for="txtNumero" class="form-label">N° Ordem de Serviço</label>
                    <input type="text" name="txtNumero" id="txtNumero" readonly class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="txtData" class="form-label">Data</label>
                    <input type="date" name="txtData" id="txtData" value="<?php echo date('Y-m-d') ?>" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <label for="sltCliente" class="form-label"></label>
                    <select name="sltCliente" id="sltCliente" class="form-select">
                        <option selected>Selecione o Cliente</option>
                        <?php
                        $cliente = new Cliente();
                        foreach ($cliente->listaOrdenada('nomeCliente') as $key =>$row) {
                        ?>
                            <option value="<?php echo $row->idCliente ?> "><?php echo $row->nomeCliente ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <!-- Button trigger modal -->
                <div class="mt-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalOS">
                        Adicionar Serviço
                    </button>
                </div>
            </div>
            <div class="row mt-3" style="min-height: 100px;">
                <table id="tblOS" class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Serviço</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Total</th>
                        <th>Exluir</th>
                    </thead>
                    <tbody id="ItemOS" class="">

                    </tbody>
                    <tfoot>
                        <tr><td colspan="6"></td></tr>
                    </tfoot>
                </table>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <label for="txtDesconto" class="form-label">Desconto</label>
                    <input type="text" name="txtDesconto" id="txtDesconto" class="form-control" onblur="totalVenda()" value="0">
                </div>
                <div class="col-md-2">
                    <label for="txtTotal" class="form-label">Total</label>
                    <input type="text" name="txtTotal" id="txtTotal" value="" readonly class="form-control">
                </div>
            </div>
            <div class="mt-3"><button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button></div>
            
        </form>
        <!-- Modal -->
        <div class="modal fade" id="modalOS" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Selecione o Serviço</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Serviço</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Adicionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $servicos = new Servico();                               
                                foreach ($servicos->listaOrdenada('nomeServico') as $key => $serv_row ) {
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $serv_row->idServico ?></td>
                                        <td><?php echo $serv_row->nomeServico ?></td>
                                        <td><?php echo $serv_row->descricaoServico ?></td>
                                        <td><?php echo $serv_row->precoServico ?></td>
                                        <td> <button type="button" class="btn btn-primary" onclick="AddServico(<?php echo $serv_row->idServico ?> , '<?php echo $serv_row->nomeServico ?>', <?php echo $serv_row->precoServico ?>)"> <i class="bi bi-plus-circle-fill"></i></button></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/scripts.js">
        
    </script>
    <?php include '_parts/_linkJS.php' ?>
</body>

</html>