<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=index.html"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Logout - Forum AC</title>
</head>
<body>

<header>
    <a href="index.html">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>

    <?php
        session_start();
        $_SESSION = array();
        session_destroy();  
    ?>

    <h2 align="center">Sessao terminada com sucesso!</h2>
    <input type="button" value="Voltar ao inicio" onclick="window.open('index.html','_self')">
</main>
</body>
</html>
