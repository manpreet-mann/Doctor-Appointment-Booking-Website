<?php
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    include('../config.php');
    $q="Update `user` set `status`='Active' where `id`='$id'";
    $res=mysqli_query($conn,$q);
    if($res>0){
        echo "<Script>window.location.assign('user_data.php?msg=Unblocked Successfully')</script>";
    }
    else{
        echo "<Script>window.location.assign('user_data.php?msg=Try again Later!!')</script>";
    }
}

?>