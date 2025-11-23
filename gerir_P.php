<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
<body>
    <?php
    session_start();
   
    include "liga_bd.php";

    $sql = "select * from t_post";
    $resultado = mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
    $num_post = 0;
    $num_post_bloq = 0;

while($linha = mysqli_fetch_assoc($resultado)) {

    if ($linha['apagado']==1)
        echo "<div style='color:red'>";
    else
        echo "<div style='color:black'>";

    echo "<h3>Id: " . $linha['id']."</h3>";
    echo "<b>Tema:</b> " . $linha['tema']."<br>";
    echo "<b>Titulo:</b> " . $linha['titulo']."<br>";
    echo "<b>Texto:</b> " . $linha['texto']."<br>";
    echo "<b>Foto:</b><br> <img src='" . $linha['foto']."' height='100'><br><br>";
    echo "</font>";

    if ($linha['apagado'] == 0) {
    ?>
    <form action="eliminarPadm.php" method="post">
        <select name="motivo">
            <option value="2">Violencia</option>
            <option value="3">Pornografia</option>
            <option value="4">Racismo</option>
            <option value="5">Publicidade</option>
            <option value="6">Outros</option>
        </select>
            <input type="hidden" name="id_post" value="<?php echo $linha['id']; ?>">
            <input type="submit" value="Eliminar Post">
    </form>
    <?php
    } else if ($linha['apagado']==1) {
    ?>
    <form action="recuperarP.php" method="post"> 
        <input type="hidden" name="id_post" value="<?php echo $linha['id']; ?>">
        <input type="submit" value="Recuperar Post">
    </form>
    <marquee><h3>Post Bloqueado pelo ADMIN</h3></marquee>
    <?php
    }
    $num_post_bloq++;
}   
echo "</div><hr>"; 

    echo "<h3>N. de Postagens: $num_post</h3>";
    echo "<h3>N. de Postagens Bloquesadas: $num_post_bloq</h3>";

mysqli_close($ligacao);
?>
    <br><br>
    <input type="button" value="Voltar ao menu" onclick="window.history.go(-1);">
</body>
</html>