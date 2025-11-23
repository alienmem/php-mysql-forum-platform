<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Gestao de Utilizadores - AC</title>
</head>
<body>

<?php
session_start();
include 'liga_bd.php';

$sql ="select * from t_user";
$resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));

$numreg = 0;
$numbloq=0;

//repete este ciclo enquanto houver linhas
while ($linha = mysqli_fetch_assoc($resultado))
{
    if ($linha['apagado']==1) //apenas colocar o fundo azul
        echo "<div style='background-color:lightblue'>";
    echo "<br>Id:" . $linha['id']."<br>";
    echo "Nick:" . $linha['nick']."<br>"; 
    echo "Nome:" . $linha['nome']."<br>";
    echo "Email:" . $linha['email']."<br>";
    echo "Data de nascimento:" . $linha['data_nasc']."<br>";
    echo "Foto:<br> <img src='" . $linha['foto']."' height ='100'><br>";

        if ($linha['apagado']==0)
        {
            //caso o user nao esteja bloqueado
            ?>
            <form action="bloquear_U.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
            <input type="submit" value="Bloquear">
            </form><br>
            <?php
        }
        else
        {
            //caso o user esteja bloqueado
            $numbloq = $numbloq + 1;
            ?>
            <form action="desbloquear_U.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
            <input type="submit" value="Desbloquear">
            </form><br>
            <?php
            echo "</div>";
        }
        ?>
        <form action="alterar_U.php" method="post">
        <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
        <input type="submit" value="Alterar">
        </form><br>
        <?php
        echo "<hr>";
        $numreg = $numreg + 1;
    }
    
    echo "N. total de utilizadores > " . $numreg;
    echo "<br>N. de utilizadores bloqueados >" . $numbloq;

    mysqli_close($ligacao);
    ?>
    <br><br>
    <input type="button" value="Voltar ao menu" onclick="window.history.go(-1)">
</body>
</html>