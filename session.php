<?php  
require_once'PHP/login.php';
session_start();
if(!isset($_SESSION['CurrentUser'])&& session_start()) 
 { 	header('Location:index.php');


 }else{
 	//header('Location:signIn.php');
 }


?>
    
        