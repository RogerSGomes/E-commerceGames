<?php
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $connect = mysqli_connect('localhost' , 'root' , '', 'bd_ecommerce_games');
    $query_select = "SELECT * FROM tb02_usuario WHERE tb02_usuario = '$usuario' OR tb02_email = '$email'";
    $select = mysqli_query($connect,$query_select);
    $array = mysqli_fetch_array($select);
        
    //arrays dos dados do usuario;
    $usuarray = $array['tb02_usuario'];
    $emaarray = $array['tb02_email'];
    $senarray = $array['tb02_senha'];

    if($usuarray == $usuario || $emaarray == $email){
        echo("
            <script language='javascript' type='text/javascript'>
                alert('Não foi possível realizar o cadastro. Usuário já existente.');
                window.location.href = '../login.html';
            </script>
        ");
        die();
    } else {
        $query = "INSERT INTO tb02_usuario (tb02_usuario, tb02_email, tb02_senha) VALUES ('$usuario', '$email', '$senha')";
        $insert = mysqli_query($connect,$query);
        if($insert){
            echo("
                <script language='javascript' type='text/javascript'>
                    alert('Cadastro realizado com sucesso. Entre para continuar.');
                    window.location.href = '../login.html';
                </script>
            ");
        } else {
            echo("
                <script language='javascript' type='text/javascript'>
                    alert('Ocorreu algum erro durante o cadastro do usuário.');
                    window.location.href='../login.html';
                </script>
            ");
        }
    }
?>
