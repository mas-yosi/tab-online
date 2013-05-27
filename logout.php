<?php
error_reporting(0);
session_start();
session_destroy();
session_unset($_SESSION['username'], $_SESSION['password']);
echo "<script language='javascript'>document.location.href='index.php';</script>";
?>
