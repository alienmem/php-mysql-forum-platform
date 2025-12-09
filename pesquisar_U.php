<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Forum Programadores</title>
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
    //valida o acesso atraves da sessao
    include 'valida.php';
    ?>

    <h1>Pesquisa de utilizadores</h1>

    <form action="pesquisar_U2.php" method="post">

    Campo a pesquisar: <select name="tema">
        <option value="nick">Nick</option>
        <option value="nome">Nome</option>
        <option value="email">E-mail</option>
        <option value="data_nasc">Data de nascimento</option>
    </select><br><br>
    Valor: <input type="text" size="50" name="valor" required><br><br>
        <input type="submit" value="Pesquisar">
        <input type="reset" value="Limpar">
        <input type="button" value="Voltar" onclick="window.history.go(-1)">

    </form>

    <br/>
</main>

</body>
</html>
