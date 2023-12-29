<?php

@require_once __DIR__ . '/../../helpers/session.php';

if (!administrator()) {
    $signin_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Trabalho_SIR/pages/public/signin.php';
    header('Location: ' . $signin_url);
    exit(); 
}

$original_page = isset($_SESSION['original_page']) ? $_SESSION['original_page'] : 'http://' . $_SERVER['HTTP_HOST'] . '/Trabalho_SIR/pages/admin/default_admin_page.php';
header('Location: ' . $original_page);
exit();