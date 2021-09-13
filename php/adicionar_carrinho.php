<?php
    session_start();

    if(isset($_SESSION['cod'])){
        $cod = $_POST['cod'];
        $cod_plat = $_POST['plataforma'];
        $cod_usuario = $_SESSION['cod'];

        $connect = mysqli_connect('localhost' , 'root' , '', 'bd_ecommerce_games');
        $query_select = "SELECT * FROM tb03_carrinho WHERE tb03_cod_produto = '$cod' AND tb03_cod_plataforma = '$cod_plat' AND tb03_cod_usuario = '$cod_usuario'";
        $select = mysqli_query($connect,$query_select);
        $array = mysqli_fetch_array($select);
            
        //teste se o select retornou algum valor;
        $true = $array['tb03_cod_carrinho'];

        if(!$true == null){
            echo("
                <script language='javascript' type='text/javascript'>
                    alert('Este produto já está em seu carrinho.');
                    window.location.href = 'index.php#loja';
                </script>
            ");
            die();
        } else {
            $query = "INSERT INTO tb03_carrinho (tb03_cod_produto, tb03_cod_plataforma, tb03_cod_usuario) VALUES ('$cod', '$cod_plat', '$cod_usuario')";
            $insert = mysqli_query($connect,$query);
            if($insert){
                echo("
                    <script language='javascript' type='text/javascript'>
                        alert('Produto adicionado ao seu carrinho.');
                        window.location.href = 'carrinho.php';
                    </script>
                ");
            } else {
                echo("
                    <script language='javascript' type='text/javascript'>
                        alert('Ocorreu algum erro durante a adição do produto ao seu carrinho.');
                        window.location.href='index.php#loja';
                    </script>
                ");
            }
        }
    } else {
        echo("
            <script language='javascript' type='text/javascript'>
                alert('Logue em sua conta para continuar');
                window.location.href='login.html';
            </script>
        ");
    }
?>
