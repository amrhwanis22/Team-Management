<?php
require_once 'Observer.php';
require_once 'PatternObserver.php';
require_once 'PatternSubject.php';
require_once 'session.php';
$_PattSub=new PatternSubject();
$_PattObj=new PatternObserver();

$_PattSub->Attach($_PattObj);
$id=$_SESSION['CurrentID'];
$_PattSub->UpdateFav("SELECT * FROM notification WHERE reciver_id = ".$id." AND seen_unseen =0");

	
$_PattSub->UpdateFav("UPDATE notification SET seen_unseen=1 WHERE reciver_id = ".$id."");            
 ?>
