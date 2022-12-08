<?php
  require "loginCheck.php";
  session_start();
  unset($_SESSION['name']);
  session_unset();
  setcookie(session_name(), '', 0, '/');
  setcookie("name", "$userName", time() - 360,'/');
  session_destroy();
  header('Location: /');
?>