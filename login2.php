<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Forum AC</title>
</head>

<body>

<header>
    <a href="login2.php">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum da Turma 25.0082</span>
    </a>
</header>

<main>
    <h1>FORUM DA TURMA 25.0082</h1>

    <?php
        include "valida.php"; 
        echo "<h2>Bem-vindo " . $_SESSION['nick'] . "</h2>";
    ?>


            <input type="button" class="btn" value="Editar perfil" onclick="window.open('perfil.php','_self')">
            <input type="button" class="btn" value="Colocar posts" onclick="window.open('inserirP.php','_self')">
            <input type="button" class="btn" value="Listar posts" onclick="window.open('listar_P.php?tema=Todos','_self')">
            <input type="button" class="btn" value="Meus posts" onclick="window.open('meusP.php','_self')">
            <input type="button" class="btn" value="Minhas respostas" onclick="window.open('minhasR.php','_self')">
            <input type="button" class="btn" value="Logout" onclick="window.open('logout.php','_self')">


    <?php

    if (strcmp($_SESSION['nick'],"admin")==0)
    {
    ?>
    <br><br> <h2> Área de Administração</h2>
        <input type="button" value="Gerir Utilizadores" onclick="window.open('gerir_U.php','_self')">
        <input type="button" value="Gerir Posts" onclick="window.open('gerir_P.php','_self')">
        <input type="button" value="Gerir Respostas" onclick="window.open('gerir_R.php','_self')">

    <?php
    }
    ?>
</main>

</body>
</html>

