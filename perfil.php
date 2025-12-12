<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Editar Perfil - Forum dos Programadores</title>
</head>
<body>

<header>
    <a href="login2.php">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>
    <?php
    include "valida.php"; 
    include "liga_bd.php";

    $sql = "SELECT * FROM t_user WHERE id=".$_SESSION['id'];
    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    $linha = mysqli_fetch_assoc($resultado);    
    ?>

    <h1>Editar dados do utilizador</h1>

    <form action="perfil2.php" method="POST" name="f1">

        Nick: <input type="text" name="nick" size="20" maxlength="20" required readonly
            value="<?php echo $linha['nick']; ?>"><br><br>

        Nome: <input type="text" name="nome" size="100" maxlength="100" required
            value="<?php echo $linha['nome']; ?>"><br><br>

        Email: <input type="email" name="email" size="50" maxlength="50" required
            value="<?php echo $linha['email']; ?>"><br><br>

        Data de nascimento: <input type="date" name="data_nasc" required
            value="<?php echo $linha['data_nasc']; ?>"><br><br>

        Senha: <input type="password" name="pass" size="20" maxlength="20" required
            value="<?php echo $linha['pass']; ?>"><br><br>

        Foto (URL): <textarea name="foto" col="80" rows="4"><?php echo $linha['foto']; ?></textarea><br><br>

            <input type="submit" class="btn" value="Alterar"><br><br>
            <input type="reset" class="btn" value="Limpar"><br><br>
            <input type="button" class="btn" value="Voltar" onclick="window.history.go(-1)">
    </form>
</main>

</body>
</html>
