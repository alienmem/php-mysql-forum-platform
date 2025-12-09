<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Meus Posts - Forum dos Programadores</title>
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
include "valida.php"; 
include "liga_bd.php";

$sql = "SELECT * FROM t_post WHERE id_user=" . $_SESSION['id'];
$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
$numreg = 0;

while($linha = mysqli_fetch_assoc($resultado)) {
    $post_color = ($linha['apagado'] == 0) ? "black" : "red";
    echo '<div class="post-block" style="color:' . $post_color . '">';
    echo "<h3>Id: " . $linha['id'] . "</h3>";
    echo "<b>Tema:</b> " . htmlspecialchars($linha['tema']) . "<br>";
    echo "<b>Título:</b> " . htmlspecialchars($linha['titulo']) . "<br>";
    echo "<b>Texto:</b> " . nl2br(htmlspecialchars($linha['texto'])) . "<br>";

    if(!empty($linha['foto'])) {
        echo "<b>Foto:</b><br><img src='" . htmlspecialchars($linha['foto']) . "' alt='Post Image'>";
    }

    // Buttons
    if ($linha['apagado'] == 0) {
        echo '<form action="eliminarP.php" method="post" class="form-buttons">';
        echo '<input type="hidden" value="' . $linha['id'] . '" name="id_post">';
        echo '<input type="submit" class="btn" value="Eliminar Post">';
        echo '</form>';
    } else if ($linha['apagado'] == 1) {
        echo '<form action="recuperarP.php" method="post" class="form-buttons">';
        echo '<input type="hidden" value="' . $linha['id'] . '" name="id_post">';
        echo '<input type="submit" class="btn" value="Recuperar Post">';
        echo '</form>';
    } else if ($linha['apagado'] > 1) {
        echo "<marquee><h3>Post Bloqueado pelo ADMIN</h3></marquee>";
    }

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
