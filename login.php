<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <title>Forum dos Programadores - AC</title>
    </head>
    <body>
    <h1>Validacao de utilizadores</h1>
        <?php
        include 'liga_bd.php';
        
        if (session_start() !== PHP_SESSION_ACTIVE){
            $sql = "select * from t_user where nick= '$_POST[nick]'";
            $resultado = mysqli_query($ligacao, $sql);
            $linha=mysqli_fetch_assoc($resultado);

            if ($linha ==NULL)
                header('Location:erro.html');
            if(strcmp($linha['pass'],$_POST['pass'])==0)
            {
                session_start();
                $_SESSION['id']=$linha['id'];
                $_SESSION['nick']=$linha['nick'];
                header('Location:login2.php');
            }
            //caso a senha esteja incorreta
            else
                header('Location:erro.html');
        }
        mysqli_close($ligacao); echo "<br>";
        ?>
    </body>
</html>