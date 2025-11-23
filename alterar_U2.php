<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3;url=index.html">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DOS PROGRAMADORES - AC</title>
    </head>
    <body>
        <h1>Alteracao de utilizadores</h1><br><br>

        <?php
        include 'liga_bd.php';
    
        $sql ="update t_user set
            nick='$_POST[nick]',
            nome='$_POST[nome]',
            email='$_POST[email]',
            pass='$_POST[pass]',
            foto='$_POST[foto]'
        where id = $_POST[id]";

        if (mysqli_query($ligacao, $sql)) {
            echo "<h2>Utilizador alterado com sucesso!</h2>";
        }
        else {
            echo "<h2>Erro ao alterar utilizador." . mysqli_error($ligacao) . "</h2>";
        }

        mysqli_close($ligacao);
        ?>
        <input type="button" value="Continuar" onclick="window.location.href='index.html'">
    </body>
</html>