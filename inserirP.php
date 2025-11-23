<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
<body>
    <?php 
    include 'valida.php';
    include 'liga_bd.php';

    $sql = "select * from t_tema";
    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    ?>
    <h1>Inserir Posts</h1>

    <form action="inserirP2.php" method="POST">
        Id user:
        <input type="text" size="20" maxlength="20" name="id" readonly value="<?php echo $_SESSION['id']?>"><br><br>
    
        Tema: 
        <select name="tema">
        <?php
        while($linha = mysqli_fetch_assoc($resultado))
            echo "<option value='".$linha['tema']."'>".$linha['tema']."</option>";
        mysqli_close($ligacao);
        ?>
        </select><br><br>
        Titulo:
        <input type="text" size="50" maxlength="50" name="titulo" required><br><br>
        Comentario:<br>
        <textarea cols="80" rows="5" name="texto"></textarea><br><br>
    
        Foto(url):
        <br><textarea cols="80" rows="5" name="foto"></textarea><br><br>
        <input type="submit" value="Colocar Post"><br><br>
        <input type="reset" value="Limpar"><br><br>
        <input type="button" value="Voltar" onclick="window.history.go(-1)"> 
        </form>

</body>
</html>