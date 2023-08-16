<?php
session_start();
$_SESSION['user_name']='user';
$_SESSION['user_email']='user@me.com';
echo $_SESSION['user_name']."". $_SESSION['user_email'];
?>