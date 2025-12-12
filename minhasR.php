<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Minhas Respostas - Forum AC</title>
</head>
<body>

<header>
    <a href="login2.php">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>
    <h1>Minhas Respostas</h1>

<?php
include "valida.php"; 
include "liga_bd.php";

$sql = "SELECT * FROM t_resp WHERE id_user=" . $_SESSION['id'];
$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
$numreg = 0;

while ($linha = mysqli_fetch_assoc($resultado)) {

    if ($linha['apagado'] == 0)
        echo "<font color='black'>";
    else
        echo "<font color='red'>";

    echo "<h3>Id: " . $linha['id'] . "</h3>";
    echo "<b>Texto:</b> " . $linha['texto'] . "<br>";
    echo "<b>Foto:</b><br><img src='" . $linha['foto'] . "' height='100'><br><br>";
    echo "</font>";

    if ($linha['apagado'] == 0) {
?>
        <form action="eliminarR.php" method="post">
            <input type="hidden" name="id_resp" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Eliminar Resposta">
        </form>
<?php
    } elseif ($linha['apagado'] == 1) {
?>
        <form action="recuperarR.php" method="post">
            <input type="hidden" name="id_resp" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Recuperar Resposta">
        </form>
<?php
    }

    if ($linha['apagado'] > 1) {
        echo "<marquee><h3>Resposta Bloqueada pelo ADMIN</h3></marquee>";
    }

    echo "<hr>";

    $numreg++;
}

echo "N. de Respostas: " . $numreg;

mysqli_close($ligacao);
?>

<br><br>
<input type="button" class="btn" value="Voltar ao menu" onclick="window.history.go(-1);">

</main>

</body>
</html>


