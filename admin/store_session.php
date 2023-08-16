<?php
session_start();
$_SESSION['admin_name']='admin';
$_SESSION['admin_email']='admin@m.com';
echo $_SESSION['admin_name']."". $_SESSION['admin_email'];
