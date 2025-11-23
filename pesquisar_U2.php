<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Forum Programadores</title>
</head>
<body>
<?php
//valida o acesso atraves das variaveis de sessao
include 'valida.php';
include 'liga_bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema = $_POST['tema'];
    $valor = $_POST['valor'];

    $sql = "SELECT * FROM t_user WHERE $tema LIKE '%$valor%'";
    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    $numreg = 0;
    $numbloq = 0;

    //repete este ciclo enquanto houver linhas
    while ($linha = mysqli_fetch_assoc($resultado)) {
        if ($linha['apagado'] == 1) //apenas colocar o fundo azul
            echo "<div style='background-color:lightblue'>";
        echo "<br>Id:" . $linha['id'] . "<br>";
        echo "Nick:" . $linha['nick'] . "<br>";
        echo "Nome:" . $linha['nome'] . "<br>";
        echo "Email:" . $linha['email'] . "<br>";
        echo "Data de nascimento:" . $linha['data_nasc'] . "<br>";
        echo "Foto:<br> <img src='" . $linha['foto'] . "' height='100'><br>";

        if ($linha['apagado'] == 0) {
            //caso o user nao esteja bloqueado
            ?>
            <form action="bloquear_U.php" method="post">
                <input type="hidden" name="id_user" value="<?php echo $linha['id']; ?>"><br>
                <input type="submit" value="Bloquear">
            </form><br>
            <?php
        } else {
            //caso o user esteja bloqueado
            $numbloq = $numbloq + 1;
            ?>
            <form action="desbloquear_U.php" method="post">
                <input type="hidden" name="id_user" value="<?php echo $linha['id']; ?>"><br>
                <input type="submit" value="Desbloquear">
            </form><br>
            <?php
            echo "</div>";
        }
        ?>
        <form action="alterar_U.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo $linha['id']; ?>"><br>
            <input type="submit" value="Alterar">
        </form><br>
        <?php
        echo "<hr>";
        $numreg = $numreg + 1;
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
</body>
</html>