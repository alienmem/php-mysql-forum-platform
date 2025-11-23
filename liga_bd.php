<?php
$servidor = "localhost";
$user = "root";
$senha = "";
$bd = "forum";
//para criar a variavel $ligacao necessito de 4 parametros
//ip do servidor, nome de utilizador, senha e base_dados
$ligacao = mysqli_connect($servidor, $user, $senha, $bd);

if (!$ligacao) 
    die("Erro de ligacao a base de dados: " . mysqli_connect_error());
?>
   