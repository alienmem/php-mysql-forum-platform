<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Gestão de Utilizadores - AC</title>
</head>
<body>

<header>
    <a href="login2.php">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>

<h1>Gestão de Utilizadores</h1>

<?php
session_start();
include "liga_bd.php";

$sql = "SELECT * FROM t_user";
$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));

$numreg = 0;
$numbloq = 0;

while ($linha = mysqli_fetch_assoc($resultado)) 
{
    // Add classes for user cards and blocked users
    $cardClass = "user-card";
    if ($linha['apagado'] == 1) $cardClass .= " blocked";

    echo "<div class='{$cardClass}'>";

    echo "<b>Id:</b> " . $linha['id'] . "<br>";
    echo "<b>Nick:</b> " . $linha['nick'] . "<br>";
    echo "<b>Nome:</b> " . $linha['nome'] . "<br>";
    echo "<b>Email:</b> " . $linha['email'] . "<br>";
    echo "<b>Data de nascimento:</b> " . $linha['data_nasc'] . "<br>";
    echo "<b>Foto:</b><br><img src='" . $linha['foto'] . "' height='100'><br>";

    // Buttons container
    echo "<div class='button-group'>";

    if ($linha['apagado'] == 0) {
        // Active user
        echo "<form action='bloquear_U.php' method='post'>
                <input type='hidden' name='id_user' value='" . $linha['id'] . "'>
                <input type='submit' value='Bloquear'>
              </form>";
    } else {
        // Blocked user
        $numbloq++;
        echo "<form action='desbloquear_U.php' method='post'>
                <input type='hidden' name='id_user' value='" . $linha['id'] . "'>
                <input type='submit' value='Desbloquear'>
              </form>";
    }

    // Alterar button
    echo "<form action='alterar_U.php' method='post'>
            <input type='hidden' name='id_user' value='" . $linha['id'] . "'>
            <input type='submit' value='Alterar'>
          </form>";

    echo "</div>"; // close button-group
    echo "</div><hr>";

    $numreg++;
}

echo "N. total de utilizadores: " . $numreg;
echo "<br>N. de utilizadores bloqueados: " . $numbloq;

mysqli_close($ligacao);
?>

<br><br>
<input type="button" class="btn" value="Voltar ao menu" onclick="window.history.go(-1);">

</main>
</body>
</html>

