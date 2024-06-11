<?php
session_start();
$_SESSION['hospital_name']='hospital';
$_SESSION['hospital_email']='hospital@m.com';
echo $_SESSION['hospital_name']."". $_SESSION['hospital_email'];
