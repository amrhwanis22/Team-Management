<?php

require_once 'session.php';
require_once 'Board.php';
class LogIn{
    
    private $_Email;
    private $_Password;
    private $_SQL;
    public function __construct($_email,$_password)
    {
        $this->_Email=$_email;
        $this->_Password=$_password;
        
        $this->LogIn($this->_Email,$this->_Password);
        
    }
    
    private function LogIn($_email,$_password)
    {
        $board = new _20Query();

        $this->_SQL="SELECT * FROM user WHERE email='$_email' AND password='$_password'";
        //$board->Query($this->_SQL);
        $board->Query($this->_SQL);
        
        foreach($board as $row)
        {
           // session_start();
            $_SESSION['CurrentUser']=$row['email'];
            $_SESSION['CurrentID']=$row['id'];
            return true;

        }
        header('Location:index.php');

    }
    }


?>