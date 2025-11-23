<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="2;url=login2.php" />
    <link rel="stylesheet" href="estilo.css">
    <title>FORUM DO FRONTEND</title>
</head>
<body>
    <h1>Eliminar Respostas</h1>
    <?php
    include 'liga_bd.php';
    include "valida.php"; 
    
    $sql = "update t_resp set apagado = 1 where id =$_POST[id_resp]";

if (mysqli_query($ligacao, $sql)){
    echo "<h1>Resposta eliminado com sucesso!</h1>";
}
mysqli_close($ligacao);
?>
    <h2>Aguarde que vai ser redirecionado</h2>

</body>
</html>