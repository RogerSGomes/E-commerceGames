<?php
    $cod = $_POST['cod'];

    $connect = mysqli_connect('localhost' , 'root' , '', 'bd_ecommerce_games');
    $query = "DELETE FROM tb03_carrinho WHERE tb03_cod_carrinho = '$cod'";
    $delete = mysqli_query($connect,$query);
    if($delete){
        echo("
            <script language='javascript' type='text/javascript'>
                alert('Item removido de seu carrinho com sucesso.');
                window.location.href = '../carrinho.php';
            </script>
        ");
    } else {
        echo("
            <script language='javascript' type='text/javascript'>
                alert('Ocorreu algum erro durante a remoção do produto de seu carrinho.');
                window.location.href='../carrinho.php';
            </script>
        ");
    }
?>