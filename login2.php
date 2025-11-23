<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <title>Forum AC</title>
    </head>
    <body>
    <h1>FORUM DA TURMA 25.0082</h1>
        <?php
            include "valida.php"; 
            echo "<h2>Bem-vindo " . $_SESSION['nick']."</h2>";
        ?>
        <input type="button" value="Editar perfil" onclick="window.open('perfil.php','_self')">
        <input type="button" value="Colocar posts" onclick="window.open('inserirP.php','_self')">
        <input type="button" value="Listar posts" onclick="window.open('listar_P.php?tema=Todos','_self')">
        <input type="button" value="Meus posts" onclick="window.open('meusP.php','_self')">
        <input type="button" value="Minhas respostas" onclick="window.open('minhasR.php','_self')">
        <input type="button" value="Logout" onclick="window.open('logout.php','_self')">

        <?php
if (strcmp($_SESSION['nick'], "admin") == 0) {
?>
    <br><br>
    <h2>Área de Administração</h2>

    <input 
        type="button" 
        value="Gerir Utilizadores" 
        onclick="window.open('gerir_U.php', '_self')"
    >

    <input 
        type="button" 
        value="Gerir Posts" 
        onclick="window.open('gerir_P.php', '_self')"
    >

    <input 
        type="button" 
        value="Gerir Respostas" 
        onclick="window.open('gerir_R.php', '_self')"
    >
<?php
}
?>
    </body>
</html>