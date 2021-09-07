<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>E-commerce Games</title>

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="navbar-lateral.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <!-- navbar lateral -->

    <div class="nav-lateral">
        <ul>
            <li>
                <a href="#"><i class="material-icons">menu</i></a>
            </li>
            <li>
                <a href="index.php" class="active"><i class="material-icons">home</i><span
                        class="tooltip">Início</span></a>
            </li>
            <li>
                <a href="#"><i class="material-icons">store</i><span
                        class="tooltip">Loja</span></a>
            </li>
            <li>
                <a href="carrinho.html"><i class="material-icons">shopping_cart</i><span
                        class="tooltip">Carrinho</span></a>
            </li>
            <li>
                <a href="favoritos.html"><i class="material-icons">favorite</i><span
                        class="tooltip">Favoritos</span></a>
            </li>
            <label class="bottom">
                <li>
                    <a href="#"><i class="material-icons">account_circle</i><span class="tooltip">Perfil</span></a>
                </li>
                <li>
                    <a href="login.html"><i class="material-icons">login</i><span class="tooltip">Entrar</span></a>
                </li>
            </label>
        </ul>
    </div>

    <!-- conteúdo -->

    <div class="body-content">
        <div class="blur"></div>

        <!-- php - imagens borradas -->

        <?php
            try {
                $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                $consultaSQL = "SELECT * FROM tb01_produto LIMIT 12";
                $exComando = $conecta->prepare($consultaSQL);
                $conecta->exec("set names utf8");
                $exComando->execute(array());

                $cont = 0;

                foreach($exComando as $resultado) {
                    $cont = $cont + 1;
                    if ($cont == 1) {
                        echo("
                            <img id='imgblur$cont' class='imgblur active' src='data:image/jpg;base64," .  base64_encode($resultado['tb01_img'])  . "' width='100%' height='100%'>
                        ");
                    } else {
                        echo("
                            <img id='imgblur$cont' class='imgblur' src='data:image/jpg;base64," .  base64_encode($resultado['tb01_img'])  . "' width='100%' height='100%'>
                        ");
                    }
                }	
            } catch(PDOException $erro) {
                echo("Errrooooo! foi esse: " . $erro->getMessage());
            }
        ?>

        <div class='container'>

            <!-- php - conteudo dos jogos -->

            <?php
                try {
                    $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                    $consultaSQL = "SELECT * FROM tb01_produto LIMIT 12";
                    $exComando = $conecta->prepare($consultaSQL);
                    $conecta->exec("set names utf8");
                    $exComando->execute(array());

                    $cont = 0;

                    foreach($exComando as $resultado) {
                        $cont = $cont + 1;

                        
                        if ($cont == 1) {
                            echo("
                                <div class='container-prod' id='container'>
                                    <div id='content$cont' class='content active'>
                                        <p class='title'>$resultado[tb01_nome]</p>
                            ");
                        }
                        else {
                            echo("
                                    <div id='content$cont' class='content'>
                                        <p class='title'>$resultado[tb01_nome]</p>
                             ");
                        }
                        if($resultado['tb01_subtitulo']){
                            echo("
                                <p class='subtitle'>$resultado[tb01_subtitulo]</p>
                            "); 
                        }
                        echo("
                                <p class='content-text'>$resultado[tb01_descricao]</p>
                            </div>
                        ");
                        if($cont == 12) {
                            echo("
                                    <div class='container-button'>
                                        <button class='button' type='button'>Comprar Agora</button>
                                    </div>
                                </div>
                            ");  
                        }
                    }		
                } catch(PDOException $erro) {
                    echo("Errrooooo! foi esse: " . $erro->getMessage());
                }
            ?>

            <div class="empty"></div>

            <!-- carousel -->

            <style>
                <?php
                    try {
                        $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                        $consultaSQL = "SELECT * FROM tb01_produto LIMIT 12";
                        $exComando = $conecta->prepare($consultaSQL);
                        $conecta->exec("set names utf8");
                        $exComando->execute(array());

                        $cont = 0;

                        foreach($exComando as $resultado) {
                            $cont = $cont + 1;
                            echo("
                                #img$cont {
                                    background-image: url('data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  ."');
                                }                        
                            ");
                        }	
                    } catch(PDOException $erro) {
                        echo("Errrooooo! foi esse: " . $erro->getMessage());
                    }
                ?>
            </style>

            <div class="centercarousel">
                <div class="carousel">
                    <span class="span" id="left">‹</span>
                    <span class="span" id="right">›</span>
                    <div class="section">
                        <?php
                            try {
                                $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                                $consultaSQL = "SELECT * FROM tb01_produto LIMIT 12";
                                $exComando = $conecta->prepare($consultaSQL);
                                $conecta->exec("set names utf8");
                                $exComando->execute(array());
                                
                                $cont = 0;

                                foreach($exComando as $resultado1) {
                                    $cont = $cont + 1;
                                    $codprod = $resultado1['tb01_cod_produto'];

                                    if($cont == 1) {
                                        echo("
                                            <div class='active carouseldiv' id='img$cont' onclick='imgfunc($cont)'>
                                                <div class='group-elements'>
                                        ");
                                    } else {
                                        echo("
                                            <div class='carouseldiv' id='img$cont' onclick='imgfunc($cont)'>
                                                <div class='group-elements'>
                                        ");
                                    }
                                    try {
                                        $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                                        $consultaSQL = "SELECT * from tb06_relaciona_plataforma, tb05_plataforma WHERE tb05_cod_plataforma = tb06_cod_plataforma AND tb06_cod_produto = $codprod; ";
                                        $exComando = $conecta->prepare($consultaSQL);
                                        $conecta->exec("set names utf8");
                                        $exComando->execute(array());

                                        foreach($exComando as $resultado2) {
                                            echo("
                                                <div class='group-icn-nam'>
                                                    <img src='data:image/jpg;base64," .  base64_encode($resultado2['tb05_icone'])  . "' width='20' alt='Xbox'>
                                                    <span class='tooltip'>$resultado2[tb05_nome]</span>
                                                </div>                        
                                            ");
                                        }	
                                    } catch(PDOException $erro) {
                                        echo("Errrooooo! foi esse: " . $erro->getMessage());
                                    }
                                    echo("
                                            </div>
                                        </div>
                                    ");
                                }	
                            } catch(PDOException $erro) {
                                echo("Errrooooo! foi esse: " . $erro->getMessage());
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="index.js"></script>

</body>

</html>