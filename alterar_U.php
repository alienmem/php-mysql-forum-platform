<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo.css">
        <title>FORUM DOS PROGRAMADORES - AC</title>
    </head>
    <body>
        <h1>Editar utilizadores</h1>
        <?php
        include 'liga_bd.php';
    
        $sql ="select * from t_user where id=".$_POST['id_user'];
        $resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
        $linha = mysqli_fetch_assoc($resultado);
        ?>

        <hr>
        <form action="alterar_U2.php" method="post">
            Id: 
            <input type= "text" name="id" size="10" maxlength="10" readonly
                value = "<?php echo $linha['id'];?>"><br><br>

            Nick:
                <input type= "text" name="nick" size="20" maxlength="20"
                    value = "<?php echo $linha['nick'];?>"><br><br>

            Nome:
                <input type= "text" name="nome" size="80" maxlength="100"
                    value = "<?php echo $linha['nome'];?>"><br><br>
            
            Email:
                <input type= "text" name="email" size="50" maxlength="50"
                    value = "<?php echo $linha['email'];?>"><br><br>
            
            Data de nascimento:
                <input type= "date" name="data_nasc"
                    value = "<?php echo $linha['data_nasc'];?>"><br><br>
            
            Senha:
                <input type= "password" name="pass" size="20"
                    value = "<?php echo $linha['pass'];?>"><br><br>
        
            Foto: <br>
            <img height="100" src="<?php echo $linha['foto'];?>"><br><br>
            <textarea name="foto" cols="80" rows="4"><?php echo $linha['foto'];?>
            </textarea><br><br>
        
            <input type = "submit" value="Alterar"><br><br>
         </form>
        
        <?php
            mysqli_close($ligacao);
        ?>
</body>
</html>