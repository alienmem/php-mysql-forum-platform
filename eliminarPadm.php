<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=login2.php" />
    <link rel="stylesheet" href="estilo.css">
    <title>FORUM DO FRONTEND</title>
</head>
<body>
    <h1>Eliminar Posts</h1>
    <?php
    include 'liga_bd.php';
    
    $sql = "update t_post set apagado =". $_POST['motivo']." where id =". $_POST['id_post'];

if (mysqli_query($ligacao, $sql)){
    echo "<h1>Post eliminado com sucesso!</h1>";
}
mysqli_close($ligacao);
?>
    <input type="button" value="Continuar" onclick="window.history.go(-2)">
    <h2>Aguarde que vai ser redirecionado</h2>

</body>
</html>