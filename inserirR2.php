<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <meta http-equiv="refresh" content="2;url=login2.php">
        <title>FORUM DO FRONTEND</title>
    </head>
    <body>
        <h1>Inserção de Posts/Notícias</h1>
        <br/><br/>
 
        <?php
        include "valida.php"; 
        include 'liga_bd.php';
 
        $sql = "INSERT INTO t_resp (id_post, id_user, texto, foto) VALUES
        ('$_POST[id_post]', '$_POST[id]', '$_POST[texto]',
        '$_POST[foto]')";
        
        //echo $sql;
       if(mysqli_query($ligacao, $sql)){
            echo "<h2>Resposta colocada com sucesso</h2>";
       }
       else {
            echo "<h2>Erro ao colocar a resposta!</h2>";
            echo mysqli_error($ligacao);
        }
        mysqli_close($ligacao);
        ?>
        <h3>Aguarde que vai ser redicionado...</h3>
 
        <br/><br/>
    <a href="login2.php" target="_self">Voltar ao Inicio</a><br/><br/>
 
    </body>
</html>