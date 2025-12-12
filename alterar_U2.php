<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=login2.php">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Alteracao de Utilizador - AC</title>
</head>
<body>
<header>
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>
<main>
    <h1>Alteracao de utilizadores</h1><br><br>
    <?php
    include 'liga_bd.php';
    
    $sql ="update t_user set
        nick='$_POST[nick]',
        nome='$_POST[nome]',
        email='$_POST[email]',
        pass='$_POST[pass]',
        foto='$_POST[foto]'
        where id = $_POST[id]";

    if (mysqli_query($ligacao, $sql)) {
        echo "<h2>Utilizador alterado com sucesso!</h2>";
    } else {
        echo "<h2>Erro ao alterar utilizador." . mysqli_error($ligacao) . "</h2>";
    }

    mysqli_close($ligacao);
    ?>
    <input type="button" value="Continuar" onclick="window.location.href='login2.php'">
</main>
</body>
</html>
