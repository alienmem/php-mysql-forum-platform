<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=login2.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Post Inserido - Forum dos Programadores</title>
</head>
<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>

<main class="container center-text">
    <?php
    include "liga_bd.php";

    $sql = "insert into t_post(tema, titulo, texto, foto, id_user) values
    ('$_POST[tema]',
    '$_POST[titulo]', 
    '$_POST[texto]',
    '$_POST[foto]',
     $_POST[id])";

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Post colocado com sucesso!</h1>";
    }
    mysqli_close($ligacao);
    ?>

    <div class="form-buttons">
        <input type="button" class="btn" value="Continuar" onclick="window.history.go(-2)">
    </div>

</main>

</body>
</html>
