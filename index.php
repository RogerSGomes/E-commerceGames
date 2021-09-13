<?php
    session_start();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>E-commerce Games</title>

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar-lateral.css">

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
                <a id="inicionav" href="#inicio"><i class="material-icons">home</i><span
                        class="tooltip">Início</span></a>
            </li>
            <li>
                <a id="lojanav" class='lojabutton' href="#loja"><i class="material-icons">store</i><span
                        class="tooltip">Loja</span></a>
            </li>
            <?php
                if(!isset($_SESSION['cod'])){
                    echo("
                        <label class='bottom'>
                            <li>
                                <a href='login.html'><i class='material-icons'>login</i><span
                                        class='tooltip'>Entrar</span></a>
                            </li>
                        </label>
                    ");
                } else {
                    echo("
                        <li>
                            <a href='carrinho.php'><i class='material-icons'>shopping_cart</i><span
                                    class='tooltip'>Carrinho</span></a>
                        </li>
                        <label class='bottom'>
                            <li>
                                <a href='php/sair.php'><i class='material-icons'>logout</i><span class='tooltip'>Sair</span></a>
                            </li>
                        </label>
                    ");
                }
            ?>
        </ul>
    </div>

    <!-- conteúdo -->

    <div class="body-content">
        <div class="jumbotron" id="inicio">
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
                                            <button class='lojabutton button' type='button'>Comprar Agora</button>
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
                                if ($cont == 1) {
                                    echo("
                                        .container {
                                            background-image: url('data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  ."');
                                        }
                                    ");
                                }
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
        <div class="loja" id="loja">
            <p class="title">Loja de games</p>
            <div class="card-group">
                <?php
                    try {
                        $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                        $consultaSQL = "SELECT * FROM tb01_produto";
                        $exComando = $conecta->prepare($consultaSQL);
                        $conecta->exec("set names utf8");
                        $exComando->execute(array());

                        foreach($exComando as $resultado1) {
                            $codprod = $resultado1['tb01_cod_produto'];
                            echo("
                                <form method='POST' action='php/adicionar_carrinho.php'>
                                    <div class='card'>
                                        <input type='text' name='cod' value='$resultado1[tb01_cod_produto]' style='display: none;'>
                                        <div class='card-header'>
                                            <img src='data:image/jpg;base64,".  base64_encode($resultado1['tb01_img'])  ."' width='300px' height='100%'>
                                        </div>
                                        <div class='card-body'>
                                            <p class='title'>$resultado1[tb01_nome]</p>
                                                    
                            ");
                            if ($resultado1['tb01_preco'] == '0.00'){
                                echo("
                                     <p class='preco'>Grátis</p>          
                                ");
                            } else {
                                echo("
                                     <p class='preco'>R$ $resultado1[tb01_preco]</p>          
                                ");
                            }
                            echo("
                                <p class='plataforma'>Selecione uma plataforma</p>
                                <div class='group-img-card'> 
                                
                                <input class='plataforma plataforma$codprod' name='plataforma' type='text' value='' style='display:none' required>
                            ");
                                try {
                                    $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
                                    $consultaSQL = "SELECT * FROM tb05_plataforma, tb06_relaciona_plataforma WHERE tb06_cod_plataforma = tb05_cod_plataforma AND tb06_cod_produto = $codprod";
                                    $exComando = $conecta->prepare($consultaSQL);
                                    $conecta->exec("set names utf8");
                                    $exComando->execute(array());
        
                                    foreach($exComando as $resultado2) {
                                        echo("
                                            <img id='plataforma-$codprod-$resultado2[tb05_cod_plataforma]' src='data:image/jpg;base64,".  base64_encode($resultado2['tb05_icone'])  ."' width='25px' height='25px'>            
                                        
                                            
                                            <script language='javascript' type='text/javascript'>
                                                $('#plataforma-$codprod-$resultado2[tb05_cod_plataforma]').click(function() {
                                                    $('.active-img-card').removeClass('active-img-card');
                                                    $('#plataforma-$codprod-$resultado2[tb05_cod_plataforma]').addClass('active-img-card');

                                                    $('.plataforma').val('');
                                                    $('.plataforma$codprod').val('$resultado2[tb05_cod_plataforma]');
                                                });
                                            </script>
                                        ");
                                    }	
                                } catch(PDOException $erro) {
                                    echo("Errrooooo! foi esse: " . $erro->getMessage());
                                }
                            echo("
                                            </div>
                                        </div>
                                        <div class='card-footer'>
                                            <button type='submit' class='btn-card-loja'><i class='material-icons'>shopping_cart</i> Adicionar ao carrinho</button>
                                        </div>
                                    </div>    
                                </form>  
                            ");
                        }	
                    } catch(PDOException $erro) {
                        echo("Errrooooo! foi esse: " . $erro->getMessage());
                    }
                ?>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="js/index.js"></script>

<?php
    try {
        $conecta = new PDO("mysql:host=localhost;dbname=bd_ecommerce_games", "root" , "");
        $consultaSQL = "SELECT tb01_img FROM tb01_produto LIMIT 12";
        $exComando = $conecta->prepare($consultaSQL);
        $conecta->exec("set names utf8");
        $exComando->execute(array());
        
        $cont = 0;

        foreach($exComando as $resultado) {
            $cont = $cont + 1;
            echo("
                <script language='javascript' type='text/javascript'>
                    $('#img$cont').click(function() {
                        $('.container').css({
                            'background-image': 'url(data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  .")'
                        });
                    });

                    $('#right').click(function () {
                        if (cont + 1 == $cont) {
                            if (cont <= 11) {
                                $('.container').css({
                                    'background-image': 'url(data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  .")'
                                });
                            }
                        }
                    });

                    $('#left').click(function () {
                        if (cont - 1 == $cont) {
                            if (cont > 1) {
                                $('.container').css({
                                    'background-image': 'url(data:image/jpg;base64,".  base64_encode($resultado['tb01_img'])  .")'
                                });
                            }
                        }
                    });
                </script>
            ");
        }	
    } catch(PDOException $erro) {
        echo("Errrooooo! foi esse: " . $erro->getMessage());
    }
?>

</html>