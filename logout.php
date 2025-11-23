<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="2;url=index.html"/>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
    <body>

    <?php
        session_start();
        $_SESSION = array();
        session_destroy();  
    ?>

    <h2 align="center">Sessao terminada com sucesso!</h2>
    <input type="button" value="Voltar ao inicio" onclick="window.open('index.html','_self')">
    </body>
</html>