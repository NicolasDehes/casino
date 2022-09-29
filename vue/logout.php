<?php   
 session_name('myid'); 
 session_start();  
 session_destroy();  
 header("location:login.php");  
 ?>