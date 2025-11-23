<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="2;url=login2.php" />
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
    <body>
        <?php
        include "valida.php"; 
        include "liga_bd.php";

    $sql = "update t_user
    set
        nome = '$_POST[nome]',
        email = '$_POST[email]',
        data_nasc = '$_POST[data_nasc]',
        pass = '$_POST[pass]',
        foto = '$_POST[foto]' where id=".$_SESSION['id'];

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Dados alterados com sucesso!</h1>";
    }
    mysqli_close($ligacao);
    ?>
    <h2>Aguarde que vai ser redirecionado</h2>
    </body>
</html>