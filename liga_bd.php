<?php

$servidor = "localhost";
$user = "root";
$senha = "";
$bd = "forum";

$ligacao = mysqli_connect($servidor, $user, $senha, $bd);

if (!$ligacao) {
    die("Erro de ligacao a base de dados: " . mysqli_connect_error());
}
?>
 
