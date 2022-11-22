<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '_parts/_linkCSS.php'; ?>
    <title>Cadastro de Usuario</title>
</head>

<body>
    <?php include_once '_parts/_header.php'; ?>
    
    <div class="container mt-3">
        <?php
        spl_autoload_register(function ($class) {
            require_once "./Classes/{$class}.class.php";
        });
        if (filter_has_var(INPUT_GET, 'id')) {
            $usuario = new User();
            $id = filter_input(INPUT_GET, 'id');
            $usuarioEdit = $usuario->buscar('idUsuario', $id);
        }
        if (filter_has_var(INPUT_GET, 'idDel')) {
            $usuario = new User();
            $id = filter_input(INPUT_GET, 'idDel');
            $usuario->deletar('idUsuario',$id);
        ?>
            <script>
                window.location.href = 'usuarios.php';
            </script>
        <?php
        }
        if (filter_has_var(INPUT_POST, 'btnGravar')) {
            $usuario = new User();
            $id = filter_input(INPUT_POST, 'txtId');
            $usuario->setId($id);
            $usuario->setUsuario(filter_input(INPUT_POST, 'txtUsuario'));
            $senha = sha1(filter_input(INPUT_POST, 'txtSenha'));
            $confirma = sha1(filter_input(INPUT_POST, 'txtConfirma'));
            if ($senha === $confirma) {
                $usuario->setSenha($senha);
                if (empty($id)) {
                    $usuario->inserir();
                } else {
                    $usuario->atualizar('idUsuario', $id);
                }
            }else{
                ?>
                <script>
                    alert('Senha e Confirmação não são iguais');
                    window.history.back();
                </script>
                <?php
            }
            
        } else {
            ?>
            <div class="mt-3 col-4" style=" margin: 0 auto; width: 400px;">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="txtId" value="<?php echo isset($usuarioEdit->idUsuario) ? $usuarioEdit->idUsuario : null ?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario" value="<?php echo isset($usuarioEdit->loginUsuario) ? $usuarioEdit->loginUsuario : null ?>">
                        <label for="txtUsuario">Usuário</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Password">
                        <label for="txtSenha">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="txtConfirma" name="txtConfirma" placeholder="Password">
                        <label for="txtConfirma">Confirma Senha</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnGravar">Salvar</button>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
    <?php include_once '_parts/_linkJS.php' ?>
</body>

</html>