<?php
require_once 'Board.php';
require_once 'session.php';
 $id = $_GET["id"];
 $board = new board();
 $board->ChangeCheckList($id);
   header("location:index.php");
?>