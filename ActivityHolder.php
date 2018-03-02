<?php
require_once 'Notification.php';
require_once 'Board.php';
$_ID=$_POST ['id'];
$_Comment=$_REQUEST['Comment'];
$Actv=new Activity(0,$_Comment,0,$_ID);
header('Location:cardview.php?id='.$_ID);
?>
