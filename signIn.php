<?php
/*
require_once 'Board.php';
$login = new board();

if($login->is_loggedin()!="")
{
	$login->redirect('index.php');
}
*/
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
  <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="CSS/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="CSS/style.css" type="text/css"  />
  
     
   <style>   
                        
                            
               .button-success {
               background: rgb(28, 184, 65);
                               }
                      
   </style>
    
  </head>

  <body>
	<div class="signin-form">
	<div class="container">

      <form  class="form-signin" method="POST" name="myform" onsubmit="return ValidateForm()">

      <h2 class="form-signin-heading">Login</h2><hr />

      	<div class="form-group">
        <input type="text" class="form-control" name="Email" placeholder="example@gmail.com" required />
        <span id="check-e"></span>
        <div  style="color:red" id="EmailError"></div>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="**********" />
        <div  style="color:red" id="PassTypeError1"></div>
        </div>
       
     	<hr />
        
        <div class="form-group">
        <button type="submit" name="sub" value = "Submit" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
        </button>
        </div>  
      	<br />
        <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>


    </form>
              </div>
              </div>
  <?php
   if(isset($_POST['sub']))
   {
     require_once 'PHP/login.php';
     $email=$_REQUEST['Email'];
     $password=$_REQUEST['password'];
   
      $login=new LogIn($email,$password);
      if($login)
      {
        header('Location:index.php');
      }else{echo "please enter your username and password";}

   }
  ?>

  </body>
</html>