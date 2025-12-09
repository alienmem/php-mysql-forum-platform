<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/themes.css">
    <title>Responder ao Post - Forum AC</title>
</head>
<body>

<header class="site-header">
    <a href="login2.php" class="logo-link">
        <img src="assets/img/logo.svg" alt="Forum Logo" class="logo">
        <span class="site-title">Forum dos Programadores - AC</span>
    </a>
</header>

<main class="container">

<?php
include "valida.php";
include "liga_bd.php";

$sql = "SELECT * FROM t_post WHERE id=" . $_POST['id_post'];
$resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
$linha = mysqli_fetch_assoc($resultado);
?>

<!-- ===================== POST BLOCK ===================== -->
<h1 class="center-text">Responder ao Post</h1>

<div class="post-block">
    <p><strong>Id:</strong> <?= $linha['id'] ?></p>
    <p><strong>Tema:</strong> <?= $linha['tema'] ?></p>
    <p><strong>Título:</strong> <?= $linha['titulo'] ?></p>
    <p><strong>Texto:</strong><br><?= $linha['texto'] ?></p>

    <?php if (!empty($linha['foto'])): ?>
        <p><strong>Foto:</strong></p>
        <img src="<?= $linha['foto'] ?>" height="150">
    <?php endif; ?>

    <?php
    $sql2 = "SELECT * FROM t_user WHERE id=" . $linha['id_user'];
    $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
    $linha2 = mysqli_fetch_assoc($resultado2);
    ?>
    <p><strong>Autor:</strong> <?= $linha2['nick'] ?></p>
</div>

<!-- ===================== RESPONSES BLOCK ===================== -->

<h2 class="center-text">Respostas ao Post</h2>

<div class="responses-box">
<?php
$sql3 = "SELECT * FROM t_resp WHERE apagado=0 AND id_post=" . $linha['id'];
$resultado3 = mysqli_query($ligacao, $sql3) or die(mysqli_error($ligacao));

$numresp = 0;

while ($resp = mysqli_fetch_assoc($resultado3)):
    $sql4 = "SELECT * FROM t_user WHERE id=" . $resp['id_user'];
    $resultado4 = mysqli_query($ligacao, $sql4) or die(mysqli_error($ligacao));
    $autorResp = mysqli_fetch_assoc($resultado4);
    $numresp++;
?>
    <div class="response-item">
        <p><?= $resp['texto'] ?></p>
        <?php if (!empty($resp['foto'])): ?>
            <img src="<?= $resp['foto'] ?>" height="120"><br>
        <?php endif; ?>
        <small>— <?= $autorResp['nick'] ?></small>
    </div>
<?php endwhile; ?>

    <p><strong>Total de respostas:</strong> <?= $numresp ?></p>
</div>

<!-- ===================== RESPONSE FORM ===================== -->

<h2 class="center-text">Responder ao Post</h2>

<form action="inserirR2.php" method="post">

    <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
    <input type="hidden" name="id_post" value="<?= $linha['id'] ?>">

    <label><strong>Texto:</strong></label><br>
    <textarea cols="80" rows="4" name="texto"></textarea><br><br>

    <label><strong>Foto (URL):</strong></label><br>
    <textarea cols="80" rows="2" name="foto"></textarea><br><br>

    <div class="form-buttons">
        <input type="submit" value="Responder">
        <input type="reset" value="Limpar">
        <input type="button" value="Voltar" onclick="window.history.go(-1)">
    </div>
</form>

<?php mysqli_close($ligacao); ?>

</main>
</body>
</html>

