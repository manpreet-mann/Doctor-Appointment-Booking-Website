<?php
    include '../config.php';
    $id = $_GET['id'];
    echo $id;
    $q = "delete from `hospital` where id='$id'";
    $result = mysqli_query($conn,$q);
    if($result > 0){
        echo "<script>window.location.assign('select_hospital.php?msg=Record Deleted');</script>";
    }else{
        echo "<script>window.location.assign('select_hospital.php?msg=Try Again.');</script>";
    }
?>