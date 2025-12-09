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

<header class="site-header">
    <a href="index.html" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>

<main class="container center-text">

    <?php
        session_start();
        $_SESSION = array();
        session_destroy();  
    ?>

    <h2>Sessao terminada com sucesso!</h2>
    <input type="button" class="btn" value="Voltar ao inicio" onclick="window.open('index.html','_self')">
</main>
</body>
</html>
