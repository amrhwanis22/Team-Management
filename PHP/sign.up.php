<?php
     require_once 'MysqlImprovedConnection.php';
     require_once 'MysqlImprovedResult.php';
class user{   

	public function AddUserInfo($name,$email,$password,$mobile)
    {
        $conn=new Pos_MysqlImprovedConnection();

        $sql = "INSERT INTO user (name, email, password, mobile)
    VALUES ('$name','$email','$password','$mobile')";

        
        $result=$conn->getResultSet($sql);

            if($result){
                header("Location: signIn.php");
            }
            
    }
}
?>