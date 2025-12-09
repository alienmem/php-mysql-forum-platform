<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['nick'])) {
    header('Location: erro_acesso.html');
    exit;
}
?>

