<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=login2.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Perfil Atualizado - Forum dos Programadores</title>
</head>
<body>
<header>
    <a href="login2.php">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>
    <?php
    include "valida.php"; 
    include "liga_bd.php";

    $sql = "update t_user
    set
        nome = '$_POST[nome]',
        email = '$_POST[email]',
        data_nasc = '$_POST[data_nasc]',
        pass = '$_POST[pass]',
        foto = '$_POST[foto]' where id=".$_SESSION['id'];

    if (mysqli_query($ligacao, $sql)){
        echo "<h1>Dados alterados com sucesso!</h1>";
    }
    mysqli_close($ligacao);
    ?>
    <h2>Aguarde que vai ser redirecionado</h2>
</main>
</body>
</html>
