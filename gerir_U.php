<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Gestao de Utilizadores - AC</title>
</head>
<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>

<main class="container">

<h1 clas=center-text">Gestao de Utilizadores</h1>

<?php
session_start();
include 'liga_bd.php';

$sql ="select * from t_user";
$resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));

$numreg = 0;
$numbloq=0;

while ($linha = mysqli_fetch_assoc($resultado)) {
    $style = ($linha['apagado']==1) ? "background-color:lightblue; padding:10px; margin-bottom:10px;" : "padding:10px; margin-bottom:10px;"; 
    echo "<div style='$style'>";

    echo "<br>Id:" . $linha['id']."<br>";
    echo "Nick:" . $linha['nick']."<br>"; 
    echo "Nome:" . $linha['nome']."<br>";
    echo "Email:" . $linha['email']."<br>";
    echo "Data de nascimento:" . $linha['data_nasc']."<br>";
    echo "Foto:<br> <img src='" . $linha['foto']."' height ='100'><br>";

    //Actions
    if ($linha['apagado']==0) {
        echo '<form action="bloquear_U.php" method="post">
                <input type="hidden" name="id_user" value="' . $linha['id'] . '">
                <input type="submit" value="Bloquear">
                </form>';
    } else {
        //caso o user esteja bloqueado
        $numbloq++;
        echo '<form action="desbloquear_U.php" method="post">
                <input type="hidden" name="id_user" value="' . $linha['id'] . '">
                <input type="submit" value="Desbloquear">
            </form>';
    }
        echo '<form action="alterar_U.php" method="post">
                <input type="hidden" name="id_user" value="' . $linha['id'] . '">
                <input type="submit" value="Alterar">
            </form>';

        echo "</div>"; //end user block
        echo "<hr>";
        $numreg++;
    }
    
    echo "N. total de utilizadores > " . $numreg;
    echo "<br>N. de utilizadores bloqueados >" . $numbloq;

    mysqli_close($ligacao);
    ?>
    <br><br>
    <input type="button" value="Voltar ao menu" onclick="window.history.go(-1)">
</main>
</body>
</html>
