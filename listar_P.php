<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Listagem de Posts - <?php echo isset($_GET['tema']) ? htmlspecialchars($_GET['tema']) : 'Todos'; ?></title>
</head>
<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>

<main class="container">
    <?php
    include "liga_bd.php";
    include "valida.php"; 
    include "filtra_P.php";  // make sure heading in filtra_P.php is removed

    // Determine the theme
    $tema_atual = isset($_GET['tema']) ? $_GET['tema'] : "Todos";

    // Dynamic heading
    echo '<h1 class="center-text">Listagem de Posts - ' . htmlspecialchars($tema_atual) . '</h1>';

    // Filter SQL
    if ($tema_atual === "Todos") {
        $sql = "SELECT * FROM t_post WHERE apagado=0";
    } else {
        $sql = "SELECT * FROM t_post WHERE apagado=0 AND tema='" . mysqli_real_escape_string($ligacao, $tema_atual) . "'";
    }

    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    $numreg = 0;

    while($linha = mysqli_fetch_assoc($resultado)) {
        echo '<div class="post-block">';
        echo "<h3>Id: " . $linha['id'] . "</h3>";
        echo "<b>Tema:</b> " . $linha['tema'] . "<br>";
        echo "<b>Título:</b> " . $linha['titulo'] . "<br>";
        echo "<b>Texto:</b> " . nl2br($linha['texto']) . "<br>";

        if(!empty($linha['foto'])) {
            echo "<b>Foto:</b><br><img src='" . $linha['foto'] . "' alt='Post Image' class='post-image'>";
        }

        // Get user nickname
        $sql2 = "SELECT * FROM t_user WHERE id=" . $linha['id_user'];
        $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
        $linha2 = mysqli_fetch_assoc($resultado2);
        echo "<h3>Nick: " . htmlspecialchars($linha2['nick']) . "</h3>";

        // Response button
        echo '<form action="inserirR.php" method="post" class="form-buttons">';
        echo '<input type="hidden" value="' . $linha['id'] . '" name="id_post">';
        echo '<input type="submit" class="btn" value="Ver Respostas / Responder">';
        echo '</form>';

        echo '</div>'; // close post-block
        $numreg++;
    }

    echo "<p class='center-text'>N. de Postagens: " . $numreg . "</p>";
    mysqli_close($ligacao);
    ?>

    <div class="form-buttons">
        <input type="button" class="btn" value="Voltar ao menu" onclick="window.history.go(-1);">
    </div>
</main>

</body>
</html>

