<?php
session_start();
include 'liga_bd.php';

$sql = "select * from t_user where nick= '$_POST[nick]'";
$resultado = mysqli_query($ligacao, $sql);
$linha=mysqli_fetch_assoc($resultado);

if ($linha ==NULL) {
    header('Location:erro.html');
    exit;
}

if(strcmp($linha['pass'],$_POST['pass'])==0)
{
    $_SESSION['id']=$linha['id'];
    $_SESSION['nick']=$linha['nick'];
    header('Location:login2.php');
    exit;
} else {
    header('Location:erro.html');
    exit;
}

mysqli_close($ligacao);
?>
