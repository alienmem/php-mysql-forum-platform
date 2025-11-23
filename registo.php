<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3;url=index.html" />
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DOS PROGRAMADORES - AC</title>
    </head>
    <body>
<?php
    include "liga_bd.php";

    $sql ="insert into t_user(nick, nome, email, data_nasc, pass, foto) values
        ('$_POST[nick]',
        '$_POST[nome]', '$_POST[email]', '$_POST[data_nasc]',
        '$_POST[pass]', '$_POST[foto]')";

if (mysqli_query($ligacao, $sql)) {
    echo "<h1>Registo inserido com sucesso!</h1>";
}
else {
    echo "<h1>Erro ao inserir registo: " . mysqli_error($ligacao) . "</h1>";
}
mysqli_close($ligacao); //not strictly necessary beacause
//PHP closes connections automatically at the end of the script.
?>
    <h2>Aguarde que vai ser redirecionado</h2>
    </body>
</html>