<?php
if(isset($_GET['id'])){
 $id=$_GET['id'];
   include('../config.php');
 //  $query="UPDATE `appointment` SET `status`='Accepted' WHERE `id`=$id";
   $query="UPDATE appointment SET status='Accepted' WHERE id=".$id;
 
   $res=mysqli_query($conn,$query);
   if($res>0){
       echo "<script>window.location.assign('view_appointment.php?msg=Accepted Successfully')</script>";
   }
   else{
       echo "<script>window.location.assign('view_appointment.php?msg=Error!!Try Again')</script>";
   }
}
?>