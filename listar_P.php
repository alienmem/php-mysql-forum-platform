<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
<body>
    <?php
   
    include "liga_bd.php";
    include "valida.php"; 
    include "filtra_P.php";  

    $sql = "select * from t_post where apagado=0";
    $resultado = mysqli_query($ligacao, $sql)
        or die (mysqli_error($ligacao));
    $numreg = 0;

    while($linha = mysqli_fetch_assoc($resultado))
    {
        echo "<h3>Id: " . $linha['id']."</h3>";
        echo "<b>Tema:</b> " . $linha['tema']."<br>";
        echo "<b>Titulo:</b> " . $linha['titulo']."<br>";
        echo "<b>Texto:</b> " . $linha['texto']."<br>";
        echo "<b>Foto:</b><br> <img src='" .
        $linha['foto']."' height='100'><br><br>";
        $sql2="select * from t_user where id=" . $linha['id_user'];
        $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
        $linha2 = mysqli_fetch_assoc($resultado2);
        echo "<h3>Nick " . $linha2['nick']. "</h3>";
        ?>

        <form action="inserirR.php" method="post">
            <input type="hidden" value="<?php echo $linha['id']?>" name="id_post">
            <input type="submit" value="Ver Respostas / Responder">
        </form>
        <?php
        echo "<hr>";
        $numreg = $numreg + 1;
    }
    echo "N. de Postagens > " . $numreg;
    mysqli_close($ligacao);
    ?>
        <br><br>
        <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">    
</body>
</html>