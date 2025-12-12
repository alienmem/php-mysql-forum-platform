<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Forum Programadores</title>
</head>
<body>

<header>
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>

<?php
include 'valida.php';
include 'liga_bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tema = $_POST['tema'];
    $valor = $_POST['valor'];

    $sql = "SELECT * FROM t_user WHERE $tema LIKE '%$valor%'";
    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));

    $numreg = 0;
    $numbloq = 0;

    while ($linha = mysqli_fetch_assoc($resultado)) {
        if ($linha['apagado'] == 1) 
            echo "<div style='background-color:lightblue; padding: 10px; border-radius: 5px'>";
        else
            echo "<div style='padding: 10px; border-radius: 5px'>";
        echo "<br>Id:" . $linha['id'] . "<br>";
        echo "Nick:" . $linha['nick'] . "<br>";
        echo "Nome:" . $linha['nome'] . "<br>";
        echo "Email:" . $linha['email'] . "<br>";
        echo "Data de nascimento:" . $linha['data_nasc'] . "<br>";
        echo "Foto:<br> <img src='" . $linha['foto'] . "' height='100'><br>";

        // botoes bloquear/desbloquear
        if ($linha['apagado'] == 0) {
            ?>
            <form action="bloquear_U.php" method="post">
                <input type="hidden" name="id_user" value="<?php echo $linha['id']; ?>"><br>
                <input type="submit" value="Bloquear">
            </form>
            <?php
        } else {
            $numbloq++;
            ?>
            <form action="desbloquear_U.php" method="post">
                <input type="hidden" name="id_user" value="<?php echo $linha['id']; ?>"><br>
                <input type="submit" value="Desbloquear">
            </form>
            <?php
        }

        //botao alterar
        ?>
        <br>
        <form action="alterar_U.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo $linha['id']; ?>"><br>
            <input type="submit" value="Alterar">
        </form>

        <?php
        echo "</div><hr>";
        $numreg++;
    }

    echo "N. total de utilizadores > " . $numreg;
    echo "<br>N. de utilizadores bloqueados >" . $numbloq;

    mysqli_close($ligacao);
} else {
    echo "Nenhum dado recebido para pesquisa.";
}
?>

<br/>
<input type="button" value="Voltar" onclick="window.history.go(-1)">

</main>
</body>
</html>
