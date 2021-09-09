<?php
    session_start();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Favoritos</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="favoritos.css">
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
                <a href="carrinho.php"><i class="material-icons">shopping_cart</i><span
                        class="tooltip">Carrinho</span></a>
            </li>
            <li>
                <a href="favoritos.php" class="active"><i class="material-icons">favorite</i><span
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

    </div>
</body>

<script type="text/javascript" src="index.js"></script>

</body>

</html>