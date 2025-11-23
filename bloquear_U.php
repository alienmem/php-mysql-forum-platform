<!DOCTYPE html>
<html lang="pt">
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
    // instrução sql para bloquear
    $sql ="update t_user set apagado=1 where id =" . $_POST['id_user'];
    if (mysqli_query($ligacao,$sql)) {
        echo "<h1>utlizador bloqueado com sucesso!</h1>";
    } else {
        echo "<h2>Erro: utilizador nao encontrado ou ja bloqueado.</h2>";
    }

    mysqli_close($ligacao);
    ?>
        <input type="button" value="Continuar" onclick="window.history.go(-2)">
</body>
</html>