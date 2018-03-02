
<?php

require_once'Board.php';
require_once'session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Window | Trello</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 80%;
      right:0px;
      position: absolute;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
      position:absolute;
      bottom:0;
      width:100%;
      height:60px; 
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;

      }
      .row.content {height:auto;} 
    }

  </style>
</head>
<body>
<!-- navigation bar-->
        <?php include 'navbar.php'; ?>

  
  <!-- main -->
<div class="container-fluid text-center">    
<div class="row content">
  
<div class="col-sm-8 text-left"> 
<div class="boards-page-board-section mod-no-sidebar">
<div class="boards-page-board-section-header">
<?php
      $board = new board();
      $board->admin($_SESSION['CurrentID']);

?>
</div>
            <div class="form-group">
            <label for="name">Name </label>
            <input type="text" class="form-control" name="name" placeholder="Full name"  />
            </div>

            <div class="form-group">
            <label for="pw">Password </label>
            <input type="password" class="form-control" name="pw" placeholder="********"  />
            </div> 

            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email: John@gmail.com"  />
            </div>
            
            <div class="form-group">
            <label for="Mobile">Mobile</label>
            <input type="text" class="form-control" name="Mobile" placeholder="Phone Number" />
            </div>

            <div class="form-group">
             <label for="pri"> Privilege </label><br/>
             <input type="checkbox" name="options[]" value="newproject.php"/> Create new admin <br/> 
             <input type="checkbox" name="options[]" value="edituser.php"/> Edit/Delete user<br/>
             <input type="checkbox" name="options[]" value="editboard.php"/> Edit/Delete board<br/>

            </div>


          
                

        <button type="submit" class="btn btn-success sendbtn" name ="sub">Submit</button>


 
<?php

class Admin 
{
    public function AddUserInfo()
    {
          $servername = "localhost";
$username = "root";
$password = "";
$dbname = "SWE";

            try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $_Name=$_POST['name'];
                 $_Age=$_POST['Age'];
                 $_Mobile=$_POST['Mobile'];
                 $_Email=$_POST['email'];
                 $_Gender=$_POST['Gender'];
                 $_Password=$_POST['pw'];
                 $type=$_POST['type'];
                 $checked=$_POST['options'];

                 $user =new User();
                 $user->SetName($_Name);
                 $user->SetAge($_Age);
                 $user->SetEmail($_Email);
                 $user->SetMobile($_Mobile);
                 $user->SetGender($_Gender);
                 $user->SetPassword($_Password);
                 $user->SetType($type);


                    $sql = "INSERT INTO user (Name, Gender, Age, Mobile,Email,Password,Uid)
    VALUES ('{$user->GetName()}','{$user->GetGender()}','{$user->GetAge()}','{$user->GetMobile()}','{$user->GetEmail()}','{$user->GetPassword()}','{$user->GetType()}')";

    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $last_id;
//if(isset($_POST['sub'])){
    if(!empty($_POST['options'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['options'] as $selected){
     $query= " INSERT INTO URL(url,Uid)VALUES ('$selected','$last_id')";
    $conn->exec($query);
  //  echo $selected;
}
}
//}


/*
  for( $i=0;$i<sizeof($checked);$i++) {
  //echo $skills[$i];
  $valuee=  $checked[$i];
 
  }
    
         


    $ssql = 'SELECT * FROM user WHERE Name = "{$user->GetName()}"';
    foreach ($conn->query($ssql) as $row) {
        echo $row['Uid'] ;
}
   $ssql = 'INSERT INTO URL (url, Uid) VALUES ( "{$user->GetName()}"';
$conn->exec($ssql);
*/    
         }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

    }
}

if(isset($_POST['sub']))
{
    $admin=new Admin();
    $admin->AddUserInfo();
    //$admin->search();
}

?>


    </form>


  </div>

    </div>




<!-- ads -->

    <div class="col-sm-2 sidenav">
      <div class="well">
        <p class="ads"> ADS </p>
      </div>
      <div class="well">
        <p class="ads"> ADS </p>
      </div>
    </div>





  </div>
</div>


<!-- ads -->
<footer class="container-fluid text-center">
  <p>Powered by Amr Hamdi - Hassan Hamdy - Ahmed El Rawy - Abdelrahman Shehata</p>  
</footer>


</body>
</html>
