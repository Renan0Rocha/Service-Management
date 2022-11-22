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
    <?php include_once '_parts/_header.php'; ?>
    <div class="container mt-3">
        <table class="table">
            <caption>Lista de usuários</caption>
            <thead class="table-secondary">
                <tr>
                    <th>Código</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="teste">
                <?php
                spl_autoload_register(function ($class) {
                    require_once "./Classes/{$class}.class.php";
                });
                $usuario = new User();
                foreach($usuario->listar() as $key => $row){
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row->idUsuario; ?></td>
                        <td><?php echo $row->loginUsuario; ?></td>
                        <td>
                            <a href="GerUsuario.php?id=<?php echo $row->idUsuario?>" class="btn btn-info">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="GerUsuario.php?idDel=<?php echo $row->idUsuario?>" class="btn btn-danger" onclick= "return confirm('Deseja excluir o Usuário <?php echo $row->loginUsuario; ?> ?')">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="GerUsuario.php" class="btn btn-success btn-lg">
            <i class="bi bi-file-earmark"></i> Novo
        </a>
    </div>
    <?php include '_parts/_linkJS.php'; ?>
</body>

</html>