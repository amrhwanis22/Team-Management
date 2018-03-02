
<?php

require_once'Board.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Team | Trello</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>




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
      height: 100%;
    }
    .tt-hint,
    .email {
            border: 2px solid #CCCCCC;
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            height: 30px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 400px;
        }
        .tt-dropdown-menu {
            width: 400px;
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
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

    .img{
                    width: 20px;
                  }  

                  .ads{
                    width: 150px;
                    border-radius: 5px;
                  }
                  .lists{
                    width:20%;
                  }
  </style>
  <script>
        $(document).ready(function() {

            $('input.email').typeahead({
                name: 'email',
                remote: 'PHP/mysql.php?query=%QUERY'

            });

        })
    </script>
</head>
<body>
<!-- navigation bar-->
        <?php include 'navbar.php'; ?>

  
  
<div class="container-fluid text-center">    
  <div class="row content">
  
<!-- left nav -->
    <div class="col-sm-2 sidenav">
    <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Assign Member</a></li>
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-plus"></span> Create Board</a></li>
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-edit"></span> Edit Team</a></li>     
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-trash"></span> Delete Team</a></li> 
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#"><span class="glyphicon glyphicon-cog"></span> Settings </a></li>
      </ul>
    </div>


<!-- main -->
<div class="col-sm-8 text-left"> 
<div class="boards-page-board-section mod-no-sidebar">
<div class="boards-page-board-section-header">
<h3>Members</h3>
<?php



 require_once'session.php';
 //echo $_SESSION['CurrentID'];
 $id = $_GET["id"];
 $board=new board();
 $board->GetTeamMembers($id);
 //echo $id;
 

?>
<h3>Boards</h3>
<?php

 require_once'session.php';
 //echo $_SESSION['CurrentID'];
 $id = $_GET["id"];
 $board=new board();
 $board->GetBoard($id);
 //echo $id;
 

?>
</div>
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


<!-- footer -->
<footer class="container-fluid text-center">
  <p>Powered by Amr Hamdi - Hassan Hamdy - Ahmed El Rawy - Abdelrahman Shehata</p>  
</footer>


    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add member</h4>
        </div>
        <div class="modal-body">
          <form id="createboard"  method="POST">
        <div class="form-group">
        <label for="email">Email</label><br>
        <input type="text"  name="email" size="30" class="email" placeholder="abc@email.com">
        </div>
        <button type="submit" class="btn btn-success sendbtn" name="addmember">Add </button>
      </form>
        </div>
        <?php
        if(isset($_POST["addmember"])){
    $board = new board();
    $board->newMember($_GET['id'],$_POST['email']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

      <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create member</h4>
        </div>
        <div class="modal-body">
          <form id="createboard"  method="POST">
          <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="" >
        </div>
        <button type="submit" class="btn btn-success sendbtn" name="createboard">Create </button>
      </form>
        </div>
        <?php

                  if(isset($_POST["createboard"])){
                  $board = new board();
                  $board->createBoard($_POST['title'],$_GET['id'],$_SESSION['CurrentID']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- Modal3 -->
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Team name</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">

         <div class="form-group">
         <label for="title">Title</label><br>
         <input name="title" type="title" class="email" id="title" aria-describedby="emailHelp" placeholder="Title" ><br>
         </div>

        <button type="submit" class="btn btn-success sendbtn" name = "editTeam">Change </button>
     
      </form>
        </div>
           <?php
        if(isset($_POST["editTeam"])){
    $board = new board();
    $board->editTeam($_GET['id'],$_POST['title']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- Modal4 -->
    <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete team confirmation</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">



        <button type="submit" class="btn btn-success sendbtn" name = "deleteTeam">Confirmation </button>
     
      </form>
        </div>
           <?php
        if(isset($_POST["deleteTeam"])){
    $board = new board();
    $board->deleteTeam($_GET['id']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</body>
</html>
