<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include_once("../../../componentes/BotaoSubmit.php");
    extract ($_POST, EXTR_OVERWRITE); 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produto - Alterar </title>
    <link rel="stylesheet" href="../../../output.css">
</head>
<body>
    <div class="flex flex-col gap-16 w-fit mx-auto my-16 h-[50%]">
        <h1 class="regular-title">
            Alterar Produto
        </h1>

        <div>
            <form name="exform" action="" method="post" class="flex flex-col gap-2 px-6 py-3 border border-gray-400 rounded-lg">
                <?php 
                    if (isset($btnenviar)) { 
                        include_once '../Produto.php';
                        $p = new Produto();
                        $p->setId($id_prod);
                        $p_lista = $p->alterar();
                ?>
                    <h2 class="font-medium text-lg text-center">
                        Lista de produtos encontrados
                    </h2>

                    <!-- Table -->
                    <div 
                        role="table"
                        class="
                        flex flex-col
                        text-left 
                        w-[600px] 
                        mx-auto p-8 pt-4 
                        border border-gray-400 rounded-lg
                        ">
                        <!-- Header -->
                        <div role="row" class="grid grid-cols-8 text-lg font-semibold mr-4 *:px-2 *:pb-2">
                            <div role="cell" class="col-span-1">
                                ID
                            </div>
                            <div role="cell" class="col-span-5">
                                Nome
                            </div>
                            <div role="cell" class="col-span-2">
                                Estoque
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
                            <div role="row" class="
                                grid grid-cols-8 py-0.5
                                ">
                                <div role="cell" class="col-span-1">
                                    <?php echo $p_registro[0]; ?>
                                </div>
                                <div role="cell" class="col-span-5">
                                    <?php echo $p_registro[1]; ?> 
                                </div>
                                <div role="cell" class="col-span-2">
                                    <?php echo $p_registro[2]; ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <h2 class="font-medium text-lg text-center">
                        Informe o ID do Produto desejado
                    </h2>
                    <hr>
                    <div class="flex items-center max-w-[200px] mx-auto my-4 text-lg">
                        <label for="id_prod"></label>
                        <input 
                            required autocomplete="off"
                            type="number" 
                            name="id_prod" 
                            id="id_prod" 
                            min="0" max="4294967295"
                            placeholder="ID"
                            class="flex-1 py-1 px-2 border-2 rounded-md outline-none focus:border-orange-500">
                    </div>
                <?php } ?>

                <!-- Botões -->
                <div class="relative">
                    <?php if(isset($btnenviar)) { ?>
                        <?php echo createButton("btnalterar", "Alterar") ?>

                        <button name="reconsultar" type="submit" class="absolute right-2 h-full -translate-y-[100%] hover:underline">
                            Reconsultar
                        </button>
                    <?php } else { ?>
                        <?php echo createButton("btnenviar", "Consultar") ?>

                        <button name="limpar" type="reset" class="absolute right-2 h-full -translate-y-[100%] hover:underline">
                            Limpar
                        </button>
                    <?php } ?>
                </div>
            </form>
        </div>

        <?php include("../../../componentes/BotaoVoltar.php") ?>
    </div>
</body>
</html>