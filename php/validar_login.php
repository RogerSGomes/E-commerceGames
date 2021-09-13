<?php
    session_start();
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $connect = mysqli_connect('localhost' , 'root' , '', 'bd_ecommerce_games');
    $query_select = "SELECT * FROM tb02_usuario WHERE tb02_usuario = '$usuario' AND tb02_senha = '$senha'";
    $select = mysqli_query($connect,$query_select);
    $array = mysqli_fetch_array($select);
        
    //arrays dos dados do usuario;
    $codarray = $array['tb02_cod_usuario'];
    $usuarray = $array['tb02_usuario'];
    $senarray = $array['tb02_senha'];

    if($senha == $senarray && $usuario == $usuarray){
            echo("
                <script language='javascript' type='text/javascript'>
                    window.location.href='../index.php';
                </script>
            ");
            $_SESSION['cod'] = $codarray;
    } else {
        echo("
            <script language='javascript' type='text/javascript'>
                alert('Usuário ou senha incorretos.');
                window.location.href = '../login.html';
            </script>
        ");
        die();
    }
?>