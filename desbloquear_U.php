<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DOS PROGRAMADORES - AC</title>
    </head>
<body>
    <h1>Bloqueio de Utilizadores</h1> 
    <?php 
    include 'liga_bd.php';
    $sql ="update t_user set apagado=0 where id = " . $_POST['id_user'];
    if(mysqli_query($ligacao,$sql)) {
        echo "<h2>Utilizador desbloqueado com sucesso!</h2>";
    }
    else {
        echo "<h2>Erro: utilizador não encontrado ou já desbloqueado.</h2>";
    }
    mysqli_close($ligacao);
    ?>
    <input type="button" value="Voltar ao inicio" onclick="window.history.go(-2)">
</body>
</html>