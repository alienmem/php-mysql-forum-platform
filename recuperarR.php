<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
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
    <h1>Recuperar Resposta</h1>

    <?php
    include 'liga_bd.php';
    include "valida.php"; 
    
    $sql = "update t_resp set apagado = 0 where id =$_POST[id_resp]";

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Resposta recuperada com sucesso!</h1>";
    }
    mysqli_close($ligacao);
    ?>
    <h2>Aguarde que vai ser redirecionado...</h2>
</main>

</body>
</html>
