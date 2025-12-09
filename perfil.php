<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Correct relative CSS path -->
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Editar Perfil - Forum dos Programadores</title>
</head>
<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
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

    <h1 class="center-text">Editar dados do utilizador</h1>

    <form action="perfil2.php" method="POST" name="f1" class="center-form">

        <label for="nick">Nick:</label>
        <input type="text" id="nick" name="nick" maxlength="20" required readonly
            value="<?php echo $linha['nick']; ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" maxlength="100" required
            value="<?php echo $linha['nome']; ?>">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" maxlength="50" required
            value="<?php echo $linha['email']; ?>">

        <label for="data_nasc">Data de nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" required
            value="<?php echo $linha['data_nasc']; ?>">

        <label for="pass">Senha:</label>
        <input type="password" id="pass" name="pass" maxlength="20" required
            value="<?php echo $linha['pass']; ?>">

        <label for="foto">Foto (URL):</label>
        <textarea id="foto" name="foto" rows="4"><?php echo $linha['foto']; ?></textarea>

        <div class="form-buttons">
            <input type="submit" class="btn" value="Alterar">
            <input type="reset" class="btn" value="Limpar">
            <input type="button" class="btn" value="Voltar" onclick="window.history.go(-1)">
        </div>
    </form>
</main>

</body>
</html>
