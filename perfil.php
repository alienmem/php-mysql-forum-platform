<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DO FRONTEND</title>
    </head>
<body>
    <?php
    include "valida.php"; 
    include "liga_bd.php";

    $sql = "select * from t_user where id=".$_SESSION['id'];
    $resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
    $linha = mysqli_fetch_assoc($resultado);
    
    ?>

    <h1>Editar dados do utilizador</h1>
    <form action="perfil2.php" method="POST" name="f1">
    Nick:
    <input type="text" size="20" required maxlength="20" name="nick" readonly
        value="<?php echo $linha['nick'];?>"><br><br>

    Nome:
    <input type="text" size="100" required maxlength="100" name="nome" 
        value="<?php echo $linha['nome'];?>"><br><br>
    
    Email:
    <input type="text" size="50" required maxlength="50" name="email" 
        value="<?php echo $linha['email'];?>"><br><br> 
    
    Data de nascimento:
    <input type="date" required  name= "data_nasc"
        value="<?php echo $linha['data_nasc'];?>"><br><br>

    Pass:
    <input type="password" size="20" required maxlength="20" name="pass"
        value="<?php echo $linha['pass'];?>"><br><br>
    
    Foto(url):<br>
    <textarea cols="80" rows="4" name="foto"><?php echo $linha['foto'];?>
    </textarea><br><br>

    <input type="submit" value="Alterar"><br><br>
    <input type="reset" value="Limpar"><br><br>
    <input type="button" value="Voltar" onclick="window.history.go(-1)"> 
    </form>

</body>
</html>