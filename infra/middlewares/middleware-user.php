<?php

session_start();

if (!isset($_SESSION['id'])) {
  
  if (isset($_COOKIE['id']) && isset($_COOKIE['name'])) {
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['name'] = $_COOKIE['name'];
  } else {
    $_SESSION['redirect_url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '../pages/public/signin.php';
    header('Location: ' . $home_url);
    exit();
  }
}

if (isset($_SESSION['id']) && isset($_SESSION['redirect_url'])) {
  $redirect_url = $_SESSION['redirect_url'];
  unset($_SESSION['redirect_url']);
  header('Location: ' . $redirect_url);
  exit();
}

?>