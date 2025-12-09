<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Forum AC</title>
</head>

<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum da Turma 25.0082</span>
    </a>
</header>

<main>
    <h1 class="center-text">FORUM DA TURMA 25.0082</h1>

    <?php
        include "valida.php"; 
        echo "<h2 class='center-text'>Bem-vindo " . $_SESSION['nick'] . "</h2>";
    ?>

    <!-- Wrap buttons in a centered container -->
    <div class="center-box">
        <div class="form-buttons">
            <input type="button" class="btn" value="Editar perfil" onclick="window.open('perfil.php','_self')">
            <input type="button" class="btn" value="Colocar posts" onclick="window.open('inserirP.php','_self')">
            <input type="button" class="btn" value="Listar posts" onclick="window.open('listar_P.php?tema=Todos','_self')">
            <input type="button" class="btn" value="Meus posts" onclick="window.open('meusP.php','_self')">
            <input type="button" class="btn" value="Minhas respostas" onclick="window.open('minhasR.php','_self')">
            <input type="button" class="btn" value="Logout" onclick="window.open('logout.php','_self')">
        </div>
    </div>

    <?php
    if ($_SESSION['nick'] === "admin") {
        echo '<br><br><h2 class="center-text">Área de Administração</h2>';
        echo '<div class="center-box">';
        echo '<div class="form-buttons">';
        echo '<input type="button" class="btn" value="Gerir Utilizadores" onclick="window.open(\'gerir_U.php\', \'_self\')">';
        echo '<input type="button" class="btn" value="Gerir Posts" onclick="window.open(\'gerir_P.php\', \'_self\')">';
        echo '<input type="button" class="btn" value="Gerir Respostas" onclick="window.open(\'gerir_R.php\', \'_self\')">';
        echo '</div>';
        echo '</div>';
    }
    ?>
</main>

</body>
</html>

