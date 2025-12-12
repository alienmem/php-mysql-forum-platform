<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Listagem de Posts</title> 
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
    include "liga_bd.php";
    include "valida.php"; 
    include "filtra_P.php";


    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    $numreg = 0;

    while($linha = mysqli_fetch_assoc($resultado)) {
        echo "<h3>Id: " . $linha['id'] . "</h3>";
        echo "<b>Tema:</b> " . $linha['tema'] . "<br>";
        echo "<b>Título:</b> " . $linha['titulo'] . "<br>";
        echo "<b>Texto:</b> " . $linha['texto'] . "<br>";

        echo "<img src='" . $linha['foto']. "' height='100'><br><br>";

        $sql2 = "SELECT * FROM t_user WHERE id=" . $linha['id_user'];
        $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
        $linha2 = mysqli_fetch_assoc($resultado2);
        echo "<h3>Nick: " . $linha2['nick'] . "</h3>";
    ?>

        <form action="inserirR.php" method="post">
            <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
            <input type="submit" value="Ver Respostas / Responder">
        </form>

        <?php

        echo '<hr>'; 
        $numreg++;
    }

    echo "N. de Postagens > " . $numreg;
    mysqli_close($ligacao);
    ?>

    <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">
</main>

</body>
</html>

