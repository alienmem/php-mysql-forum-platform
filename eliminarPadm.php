<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=login2.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>FORUM DO FRONTEND</title>
</head>
<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>

<main>
    <h1>Eliminar Posts</h1>

    <?php
    include 'liga_bd.php';
    
    $sql = "update t_post set apagado =". $_POST['motivo']." where id =". $_POST['id_post'];

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Post eliminado com sucesso!</h1>";
    }

    mysqli_close($ligacao);
    ?>

    <br>
    <input type="button" value="Continuar" onclick="window.history.go(-2)">
    <h2>Aguarde que vai ser redirecionado...</h2>
</main>

</body>
</html>
