<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Meus Posts - Forum dos Programadores</title>
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

$sql = "SELECT * FROM t_post WHERE id_user=" . $_SESSION['id'];
$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));

$numreg = 0;

while ($linha = mysqli_fetch_assoc($resultado)) {

    if ($linha['apagado'] == 0)
        echo "<font color='black'>";
    else
        echo "<font color='red'>";

    echo "<h3>Id: " . $linha['id'] . "</h3>";
    echo "<b>Tema:</b> " . $linha['tema'] . "<br>";
    echo "<b>Título:</b> " . $linha['titulo'] . "<br>";
    echo "<b>Texto:</b> " . $linha['texto'] . "<br>";
    echo "<b>Foto:</b><br><img src='" . $linha['foto'] . "' height='100'><br><br>";
    echo "</font>";

    if ($linha['apagado'] == 0) {
?>
        <form action="eliminarP.php" method="post">
            <input type="hidden" name="id_post" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Eliminar Post">
        </form>
<?php
    } elseif ($linha['apagado'] == 1) {
?>
        <form action="recuperarP.php" method="post">
            <input type="hidden" name="id_post" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Recuperar Post">
        </form>
<?php
    }

    if ($linha['apagado'] > 1) {
        echo "<marquee><h3>Post Bloqueado pelo ADMIN</h3></marquee>";
    }

    echo "<hr>";

    $numreg++;
}

echo "N. de Postagens: " . $numreg;

mysqli_close($ligacao);
?>

    <br><br>
    <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">

</main>

</body>
</html>
