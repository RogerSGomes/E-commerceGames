<?php
    session_start();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Carrinho</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="carrinho.css">
    <link rel="stylesheet" href="navbar-lateral.css">
</head>

<body class="main">

    <!-- navbar lateral -->

    <div class="nav-lateral">
        <ul>
            <li>
                <a href="#"><i class="material-icons">menu</i></a>
            </li>
            <li>
                <a href="index.php"><i class="material-icons">home</i><span class="tooltip">Início</span></a>
            </li>
            <li>
                <a href="#"><i class="material-icons">store</i><span class="tooltip">Loja</span></a>
            </li>
            <li>
                <a href="carrinho.php" class="active"><i class="material-icons">shopping_cart</i><span
                        class="tooltip">Carrinho</span></a>
            </li>
            <li>
                <a href="favoritos.php"><i class="material-icons">favorite</i><span
                        class="tooltip">Favoritos</span></a>
            </li>
            <label class="bottom">
                <li>
                    <a href="#"><i class="material-icons">account_circle</i><span class="tooltip">Perfil</span></a>
                </li>
                <li>
                    <a href="sair.php"><i class="material-icons">logout</i><span class="tooltip">Sair</span></a>
                </li>
            </label>
        </ul>
    </div>

    <!-- conteúdo -->

    <div class="content">
        <div class="itens-list">
            <p class="title">Seu Carrinho</p>
            <?php
                try {
                    $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                    $consultaSQL = "SELECT * FROM tb01_produto, tb03_carrinho, tb05_plataforma WHERE tb01_cod_produto = tb03_cod_produto AND tb03_cod_plataforma = tb05_cod_plataforma AND tb03_cod_usuario = $_SESSION[cod];";
                    $exComando = $conecta->prepare($consultaSQL);
                    $conecta->exec("set names utf8");
                    $exComando->execute(array());

                    $cont = 0;
                    foreach($exComando as $resultado) {
                        $cont = $cont + 1;
                        if ($cont == 1) {
                            echo("
                                <div class='card active' id='card$resultado[tb03_cod_carrinho]'>
                            ");
                        } else {
                            echo("
                                <div class='card' id='card$resultado[tb03_cod_carrinho]'>
                            ");
                        }
                        echo("
                                <div class='card-img'>
                                    <img src='data:image/jpg;base64," .  base64_encode($resultado['tb01_img'])  . "' width='100%' height='100%'>
                                </div>
                                <div class='card-body'>
                                    <label class='title'>$resultado[tb01_nome]</label>
                                    <label class='description'>$resultado[tb05_nome]</label>
                                    <button class='btn-card'>Visualizar detalhes <i class='material-icons'
                                            style='margin-left: 10px;'>keyboard_arrow_right</i></button>
                                </div>
                            </div>

                            <script language='javascript' type='text/javascript'>
                                $('#card$resultado[tb03_cod_carrinho]').click(function(){
                                    $('#card-img').css({
                                        'background-image': 'url(data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  .")'
                                    });
                                    $('#card-title').text('$resultado[tb01_nome]');
                                    $('#card-description').text('$resultado[tb05_nome]');
                                    
                        ");
                        if ($resultado['tb01_preco'] == '0.00'){
                            echo("
                                $('#card-preco').text('Grátis');
                            ");
                        } else {
                            echo("
                                $('#card-preco').text('R$ $resultado[tb01_preco]');
                            ");
                        }
                        echo("
                                    $('.card').removeClass('active');
                                    $('#card$resultado[tb03_cod_carrinho]').addClass('active');
                                });
                            </script>
                        ");
                    }

                    if($cont == 0) {
                        echo("
                            <div class='vazio'>
                                <img src='assets/carrinho/empty.png' width='256px' height='256px'>
                                <p class='title'>Seu carrinho está vazio</p>
                
                                <button type='button' class='btn-vazio' onclick='window.location.href='index.php';'><i class='material-icons' style='margin-right: 10px;'>shopping_cart</i> Voltar a loja</button>
                            </div>
                        ");
                    }
                } catch(PDOException $erro) {
                    echo("Errrooooo! foi esse: " . $erro->getMessage());
                }
            ?>
        </div>
        <div class="nota-fiscal">
            <div class="nota-card">
                <?php
                    try {
                        $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                        $consultaSQL = "SELECT * FROM tb01_produto, tb03_carrinho, tb05_plataforma WHERE tb01_cod_produto = tb03_cod_produto AND tb03_cod_plataforma = tb05_cod_plataforma AND tb03_cod_usuario = $_SESSION[cod] LIMIT 1;";
                        $exComando = $conecta->prepare($consultaSQL);
                        $conecta->exec("set names utf8");
                        $exComando->execute(array());

                        foreach($exComando as $resultado) {
                            echo("
                                <style>
                                    .content .nota-fiscal .nota-card .card-img {
                                        background-image: url(data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  .");
                                    }
                                </style>
                                <div class='card-img' id='card-img'></div>
                                <div class='card-body'>
                                    <label class='title' id='card-title'>$resultado[tb01_nome]</label>
                                    <label class='description' id='card-description'>$resultado[tb05_nome]</label>
                            ");
                            if ($resultado['tb01_preco'] == '0.00'){
                                echo("
                                    <label class='preco' id='card-preco'>Grátis</label>
                                ");
                            } else {
                                echo("
                                    <label class='preco' id='card-preco'>RS $resultado[tb01_preco]</label>
                                ");
                            }
                            echo(" 
                                </div>
                                <div class='card-footer'>
                                    <button class='btn-card'><i class='material-icons' style='margin-right: 10px;'>delete</i>Cancelar
                                        item</button>
                                </div>
                            ");
                        }	
                    } catch(PDOException $erro) {
                        echo("Errrooooo! foi esse: " . $erro->getMessage());
                    }
                ?>
            </div>
            <?php
                try {
                    $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                    $consultaSQL = "SELECT * FROM tb01_produto, tb03_carrinho WHERE tb01_cod_produto = tb03_cod_produto AND tb03_cod_usuario = $_SESSION[cod] LIMIT 1;";
                    $exComando = $conecta->prepare($consultaSQL);
                    $conecta->exec("set names utf8");
                    $exComando->execute(array());

                    $cont = 0;

                    foreach($exComando as $resultado) {
                        $cont = $cont + 1;

                        echo("
                            <div class='nota-body'>
                                <div class='nota-header'>
                                    <p class='title'>
                                        Detalhes da Compra
                                    </p>
                                    <div class='info'>
                                        <label class='date'>99 de janeiro</label>
                                        <label class='codigo'>#111111</label>
                                    </div>
                                </div>
                                <div class='nota-cell'>
                                    <div class='group-prod'>
                                        <label class='esq title'>JOGO</label>
                                        <label class='dir title'>VALOR</label>
                                    </div>
                        ");
                    }	

                    if ($cont == 0) {
                        echo("
                            <div class='nota-body'>
                                <div class='nota-vazia'>
                                    <img src='assets/carrinho/note.png' width='200px' height='200px'>
                                    <p>Sem Nota Fiscal</p>
                                </div>
                        ");
                        
                    }
                } catch(PDOException $erro) {
                    echo("Errrooooo! foi esse: " . $erro->getMessage());
                }
                try {
                    $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                    $consultaSQL = "SELECT * FROM tb01_produto, tb03_carrinho WHERE tb01_cod_produto = tb03_cod_produto AND tb03_cod_usuario = $_SESSION[cod];";
                    $exComando = $conecta->prepare($consultaSQL);
                    $conecta->exec("set names utf8");
                    $exComando->execute(array());

                    $total = 0;

                    foreach($exComando as $resultado) {
                        echo("
                            <div class='group-prod'>
                                <label class='esq'>$resultado[tb01_nome]</label>
                                <label class='dir'>R$ $resultado[tb01_preco]</label>
                            </div>
                        ");

                        $total = $total + $resultado['tb01_preco'];
                    }	
                } catch(PDOException $erro) {
                    echo("Errrooooo! foi esse: " . $erro->getMessage());
                }
                try {
                    $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                    $consultaSQL = "SELECT * FROM tb01_produto, tb03_carrinho WHERE tb01_cod_produto = tb03_cod_produto AND tb03_cod_usuario = $_SESSION[cod] LIMIT 1;";
                    $exComando = $conecta->prepare($consultaSQL);
                    $conecta->exec("set names utf8");
                    $exComando->execute(array());

                    foreach($exComando as $resultado) {
                        echo("
                                </div>
                                <div class='nota-cell'>
                                    <div class='group-prod'>
                                        <label class='esq'>Forma de Pagamento</label>
                                        <label class='dir'>Boleto Bancário</label>
                                    </div>
                                    <div class='group-prod'>
                                        <label class='esq'>Total</label>
                                        <label class='dir'>R$ $total </label>
                                    </div>
                                </div>
                            </div>
                            <div class='nota-footer'>
                                <button class='btn-card'>
                                    <i class='material-icons' style='margin-right: 10px;'>done</i>Confirmar compra
                                </button>
                            </div>
                        ");
                    }
                } catch(PDOException $erro) {
                    echo("Errrooooo! foi esse: " . $erro->getMessage());
                }
            ?>
        </div>
    </div>
</body>

</body>

</html>