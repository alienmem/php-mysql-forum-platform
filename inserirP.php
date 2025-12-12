<?php
include 'valida.php';
include 'liga_bd.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/themes.css">
    <title>Forum dos Programadores - Inserir Post</title>
</head>
<body>

<header>
    <a href="login2.php">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span>Forum dos Programadores - AC</span>
    </a>
</header>

<main>
    <h1>Inserir Post</h1>

    <form action="inserirP2.php" method="POST" name="f1">

        Id User: <input type="text" name="id" size="20" maxlength="20" readonly value="<?php echo $_SESSION['id']; ?>"><br><br>

        Tema:
        <select name="tema" required>
            <option value="">--Selecione um tema--</option>
            <option value="Sociedade">Sociedade</option>
            <option value="Desporto">Desporto</option>
            <option value="Compra e Venda">Compra e Venda</option>
            <option value="Viagens">Viagens</option>
            <option value="Bricolage">Bricolage</option>
        </select>
        <br><br>

        Título: <input type="text" name="titulo" size="50" maxlength="50" required><br><br>

        Comentário:<br>
        <textarea name="texto" cols="80" rows="5" required></textarea><br><br>

        Foto (URL):<br>
        <textarea name="foto" cols="80" rows="5"></textarea><br><br>

        <input type="submit" class="btn" value="Colocar Post">
        <input type="reset" class="btn" value="Limpar">
        <input type="button" class="btn" value="Voltar" onclick="window.history.go(-1)">
    </form>
</main>

</body>
</html>

