<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Relative CSS path -->
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>FORUM DO FRONTEND</title>
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
    include 'valida.php';
    include 'liga_bd.php';

    $sql = "SELECT * FROM t_tema";
    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    ?>

    <h1 class="center-text">Inserir Posts</h1>

    <form action="inserirP2.php" method="POST" class="center-form">

        <label for="id">Id user:</label>
        <input type="text" id="id" name="id" maxlength="20" readonly value="<?php echo $_SESSION['id']; ?>">

        <label for="tema">Tema:</label>
        <select name="tema" id="tema">
        <?php
        while($linha = mysqli_fetch_assoc($resultado))
            echo "<option value='".$linha['tema']."'>".$linha['tema']."</option>";
        mysqli_close($ligacao);
        ?>
        </select>

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" maxlength="50" required>

        <label for="texto">Comentário:</label>
        <textarea id="texto" name="texto" rows="5"></textarea>

        <label for="foto">Foto (URL):</label>
        <textarea id="foto" name="foto" rows="5"></textarea>

        <div class="form-buttons">
            <input type="submit" class="btn" value="Colocar Post">
            <input type="reset" class="btn" value="Limpar">
            <input type="button" class="btn" value="Voltar" onclick="window.history.go(-1)">
        </div>
    </form>
</main>

</body>
</html>
