<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>FORUM DOS PROGRAMADORES - AC</title>
</head>
<body>
<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>
<main>
    <h1>Bloqueio de Utilizadores</h1> 
    <?php 
    include 'liga_bd.php';
    $sql ="update t_user set apagado=0 where id = " . $_POST['id_user'];
    if(mysqli_query($ligacao,$sql)) {
        echo "<h2>Utilizador desbloqueado com sucesso!</h2>";
    }
    else {
        echo "<h2>Erro: utilizador não encontrado ou já desbloqueado.</h2>";
    }
    mysqli_close($ligacao);
    ?>
    <input type="button" value="Voltar ao inicio" onclick="window.history.go(-2)">
</main>
</body>
</html>
