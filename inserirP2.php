<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="2;url=login2.php">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
    <body>
        <?php
        include "liga_bd.php";

        $sql = "insert into t_post(tema, titulo, texto, foto, id_user) values
        ('$_POST[tema]',
        '$_POST[titulo]', 
        '$_POST[texto]',
        '$_POST[foto]',
         $_POST[id])";

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Post colocado com sucesso!</h1>";
    }
    mysqli_close($ligacao);
    ?>
        <input type="button" value="Continuar" onclick="window.history.go(-2)">
    </body>
</html>