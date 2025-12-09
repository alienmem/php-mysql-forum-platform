<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">

    <title>Gestão de Respostas - ADMIN</title>
</head>
<body>

<h1>Gestão de Respostas - ADMIN</h1><br><br>

<?php
session_start();
include "liga_bd.php";

$sql = "SELECT * FROM t_resp";
$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));

$num_resp = 0;
$num_resp_bloq = 0;

while ($linha = mysqli_fetch_assoc($resultado)) {

    if ($linha['apagado'] == 1)
        echo "<div style='color:red'>";
    else
        echo "<div style='color:black'>";

    echo "<h3>Id: {$linha['id']}</h3>";
    echo "<b>Texto:</b> {$linha['texto']}<br>";
    echo "<b>Foto:</b><br> <img src='{$linha['foto']}' height='100'><br><br>";

    if ($linha['apagado'] == 0) {
        // Ativa → pode ser bloqueada
        ?>
        <form action="eliminarRadm.php" method="post">
            <label><b>Motivo:</b></label>
            <select name="motivo">
                <option value="2">Violência</option>
                <option value="3">Pornografia</option>
                <option value="4">Racismo</option>
                <option value="5">Publicidade</option>
                <option value="6">Outros</option>
            </select>
            <input type="hidden" name="id_resp" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Eliminar Resposta">
        </form>
        <?php
    } else if ($linha['apagado'] == 1) {
        // Bloqueada → pode ser recuperada
        ?>
        <form action="recuperarR.php" method="post">
            <input type="hidden" name="id_resp" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Recuperar Resposta">
        </form>
        <marquee><h3>Resposta Bloqueada pelo ADMIN</h3></marquee>
        <?php
        $num_resp_bloq++;
    }

    echo "</div><hr>";
    $num_resp++;
}

echo "<h3>Nº total de respostas: $num_resp</h3>";
echo "<h3>Nº de respostas bloqueadas: $num_resp_bloq</h3>";

mysqli_close($ligacao);
?>

<br><br>
<input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">

</body>
</html>
