<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once("../../../componentes/BotaoSubmit.php");
    extract ($_POST, EXTR_OVERWRITE); 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Livro - Alterar </title>
    <link rel="stylesheet" href="../../../assets/css/output.css">
</head>
<body>
    <?php include("../../../componentes/BarraMenuInterna.php") ?>

    <div class="flex flex-col gap-16 w-fit mx-auto my-16 h-[50%]">
        <h1 class="regular-title">
            Alterar Livro
        </h1>

        <div>
            <form name="exform" action="" method="post" class="flex flex-col gap-2 px-6 py-3 border border-gray-400 rounded-lg">
                <?php 
                    if (isset($btnenviar)) { 
                        include_once '../Livro.php';
                        $p = new Livro();
                        $p->setCodLivro($cod_livro);
                        $p_lista = $p->alterar();
                ?>
                    <h2 class="smaller-title">
                        Lista de livros encontrados
                    </h2>
                    <hr>

                    <!-- Table -->
                    <div 
                        role="table"
                        class="
                            flex flex-col
                            text-left 
                            w-[960px] 
                            mx-auto"
                        >
                        <!-- Header -->
                        <div role="row" class="grid grid-cols-[repeat(18,minmax(0,1fr))] text-lg font-semibold mr-4 *:px-2 *:pb-2">
                            <div role="cell" class="col-span-1">
                                ID
                            </div>
                            <div role="cell" class="col-span-7">
                                Titulo
                            </div>
                            <div role="cell" class="col-span-3">
                                Categoria
                            </div>
                            <div role="cell" class="col-span-3">
                                ISBN
                            </div>
                            <div role="cell" class="col-span-2">
                                Idioma
                            </div>
                            <div role="cell" class="col-span-2">
                                Qt. Pág.
                            </div>
                        </div>
                        
                        <!-- Body -->
                        <div 
                            role="rowgroup" 
                            class="
                                border overflow-y-scroll h-[240px]
                                [&>*:nth-child(odd)]:bg-gray-200 *:*:px-2"
                            >
                            <?php foreach ($p_lista as $p_registro) { ?>
                            <div 
                                role="row" 
                                class="
                                    grid grid-cols-[repeat(18,minmax(0,1fr))] py-0.5
                                    *:*:w-full *:*:h-full *:*:regular-input *:*:px-2 *:*:py-0.5"
                                >
                                <div role="cell" class="col-span-1">
                                    <label for="cod_livro" class="flex align-center">
                                        <?php echo $p_registro[0]; ?>
                                    </label>
                                    <input 
                                        hidden
                                        type="text" 
                                        name="cod_livro" 
                                        value="<?php echo $p_registro[0]; ?>">
                                </div>
                                <div role="cell" class="col-span-7">
                                    <input 
                                        required
                                        type="text" 
                                        name="titulo_livro" 
                                        value="<?php echo $p_registro[1]; ?>">
                                </div>
                                <div role="cell" class="col-span-3">
                                    <input 
                                        required
                                        type="text"
                                        name="categoria_livro" 
                                        value="<?php echo $p_registro[2]; ?>">
                                </div>
                                <div role="cell" class="col-span-3">
                                    <input 
                                        required
                                        type="text" 
                                        name="isbn_livro" 
                                        value="<?php echo $p_registro[3]; ?>">
                                </div>
                                <div role="cell" class="col-span-2">
                                    <input 
                                        required
                                        type="text" 
                                        name="idioma_livro" 
                                        value="<?php echo $p_registro[4]; ?>">
                                </div>
                                <div role="cell" class="col-span-2">
                                    <input 
                                        required
                                        type="number" min="0" 
                                        name="qtde_pag_livro" 
                                        value="<?php echo $p_registro[5]; ?>">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <h2 class="smaller-title">
                        Informe o Código do Livro desejado
                    </h2>
                    <hr>
                    <div class="flex items-center max-w-[200px] mx-auto my-4 text-lg">
                        <label for="cod_livro"></label>
                        <input 
                            required autocomplete="off"
                            type="number" 
                            name="cod_livro" 
                            id="cod_livro" 
                            min="0" max="4294967295"
                            placeholder="Código"
                            class="flex-1 regular-input">
                    </div>
                <?php } ?>

                <!-- Botões -->
                <div class="relative">
                    <?php if(isset($btnenviar)) { ?>
                        <?php echo createSubmitButton("btnalterar", "Alterar") ?>

                        <button name="reconsultar" type="submit" class="absolute right-2 h-full -translate-y-[100%] hover:underline">
                            Reconsultar
                        </button>
                    <?php } else { ?>
                        <?php echo createSubmitButton("btnenviar", "Consultar") ?>

                        <button name="limpar" type="reset" class="absolute right-2 h-full -translate-y-[100%] hover:underline">
                            Limpar
                        </button>
                    <?php } ?>
                </div>
            </form>
        </div>

        <p class="text-center">
            <?php
                if(isset($btnalterar)) {
                    include_once '../Livro.php';
                    $p = new Livro();
                    $p->setCodLivro($cod_livro);
                    $p->setTitulo($titulo_livro);
                    $p->setCategoria($categoria_livro);
                    $p->setIsbn($isbn_livro);
                    $p->setIdioma($idioma_livro);
                    $p->setQtdePag($qtde_pag_livro);
                    
                    echo $p->alterar2();
                }
            ?>
        </p>

        <?php include("../../../componentes/BotaoVoltar.php") ?>
    </div>
</body>
</html>