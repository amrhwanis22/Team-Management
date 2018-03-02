<?php
require_once'PHP/sign.up.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>
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
    <form method="post" class="form-signin">

            <legend><h3>Create new team member</h3></legend>

			<div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Full name"  />
            </div>

            <div class="form-group">
            <input type="password" class="form-control" name="pw" placeholder="********"  />
            </div> 

            <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email: John@gmail.com"  />
            </div>
            
            <div class="form-group">
            <input type="text" class="form-control" name="Mobile" placeholder="Phone Number" />
            </div>
            
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="sub">
                <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="signIn.php">Sign In</a></label>
        </form>  

                
</div>
</div>

<?php

if(isset($_POST['sub']))
{
    $admin=new user();
    $admin->AddUserInfo($_POST['name'],$_POST['email'],$_POST['pw'],$_POST['Mobile']);
}

?>
</body>


