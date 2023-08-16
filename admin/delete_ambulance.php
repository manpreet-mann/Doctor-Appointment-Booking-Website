<?php
    include '../config.php';
    $id = $_GET['id'];
    echo $id;
    $q = "delete from `ambulance` where id='$id'";
    $result = mysqli_query($conn,$q);
    if($result > 0){
        echo "<script>window.location.assign('select_ambulance.php?msg=Record Deleted');</script>";
    }else{
        echo "<script>window.location.assign('select_ambulance.php?msg=Try Again.');</script>";
    }
?>