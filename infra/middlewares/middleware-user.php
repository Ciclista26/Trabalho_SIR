<?php

session_start();

if (!isset($_SESSION['id'])) {
  if (isset($_COOKIE['id']) && isset($_COOKIE['name'])) {
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['name'] = $_COOKIE['name'];
  } else {
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Trabalho_SIR/';
    header('Location: ' . $home_url);
  }
}