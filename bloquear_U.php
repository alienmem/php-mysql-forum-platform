<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=login2.php">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Bloquear Utilizador - AC</title>
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

    $sql ="update t_user set apagado=1 where id =" . $_POST['id_user'];
    if (mysqli_query($ligacao,$sql)) {
        echo "<h1>Utilizador bloqueado com sucesso!</h1>";
    } else {
        echo "<h2>Erro: utilizador nao encontrado ou ja bloqueado.</h2>";
    }

    mysqli_close($ligacao);
    ?>
    <input type="button" value="Continuar" onclick="window.history.go(-2)">
</main>
</body>
</html>
