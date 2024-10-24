<?php include_once("../componentes/BotaoSubmit.php") ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Autoria - Login</title>
    <link rel="stylesheet" href="../assets/css/output.css">
    <script src="../assets/js/block_keys.js"></script>
</head>
<body>
    <div class="flex flex-col gap-28 w-fit mx-auto mt-16 h-[50%]">
        <h1 class="regular-title">
            Login - Banco de Dados Autoria
        </h1>
        
        <form action="" method="post">
            <div class="flex flex-col gap-2">
                <h2 class="smaller-title text-xl">
                    Insira seus dados
                </h2>

                <hr class="my-2">
                
                <div class="flex flex-col gap-4 mx-auto w-3/4 *:flex *:flex-col *:gap-2 [&_label]:indent-2">
                    <div>
                        <label for="nome">Nome:</label>
                        <input 
                            autofocus required autocomplete="off" 
                            type="text" 
                            name="nome" 
                            id="nome" 
                            minlength="3" maxlength="32"
                            class="regular-input"
                            onkeypress="return blockKeys(window.event.keyCode)">
                    </div>
                    
                    <div>
                        <label for="senha">Senha:</label>
                        <input 
                            required autocomplete="off" 
                            type="password" 
                            name="senha" 
                            id="senha" 
                            minlength="8" maxlength="32"
                            class="regular-input"
                            onkeypress="return blockKeys(window.event.keyCode)">
                    </div>
                </div>
                
                <hr class="my-4">

                <?php echo createSubmitButton("btnlogin", "Login") ?>
            </div>

            <?php
                extract($_POST, EXTR_OVERWRITE);

                if(isset($btnlogin))
                {
                    include_once "Usuario.php";
                    
                    $usuario = new Usuario();
                    $usuario->setNome($nome);
                    $usuario->setSenha($senha);

                    $consulta_usuario = $usuario->logar();

                    $existe = false;

                    foreach($consulta_usuario as $consulta)
                    {
                        $existe = true;
                        ?>
                        <div class="mt-10">
                            <p class="smaller-title mb-4">
                                Bem vindo! Usuário: <?php echo $consulta[0] ?>
                            </p>

                            <a 
                                href="index.php" 
                                class="block w-fit mx-auto px-4 py-2 
                                    rounded border border-gray-300 
                                    transition-all 
                                    hover:shadow-md hover:-translate-y-0.5">
                                Entrar
                            </a>
                        </div>
                        <?php
                    }

                    if ($existe == false)
                    {
                        header("location:loginInvalido.php");
                    }
                }
            ?>
        </form>
    </div>

    <div class="absolute top-8 left-8">
        <?php include("../componentes/BotaoVoltar.php") ?>
    </div>
</body>
</html>
