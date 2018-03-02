
<?php

require_once'Board.php';
require_once'session.php';

if(!$_SESSION['CurrentID']){
   header("location:signIn.php");
   die;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Boards | Trello</title>
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

    .img{
                    width: 20px;
                  }  

                  .ads{
                    width: 150px;
                    border-radius: 5px;
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
<h3 class="boards-page-board-section-header-name">Personal Boards </h3>
</div>
<br>
   <?php
                    $board= new board();
                    $board->ListALLBoard($_SESSION['CurrentID']);
                    ?>
                    <br><br>


<button class="btn btn-default" type="submit" name="sub" data-toggle="modal" data-target="#myModal"><b>Create new Board</b></button>
</div>
<br>

<div class="boards-page-board-section mod-no-sidebar">
<div class="boards-page-board-section-header">
<h3 class="boards-page-board-section-header-name">Teams </h3>
</div>
<br>
<?php
                    $board= new board();
                    $board->AllTeams();
                    ?>
                    <br><br>
                    
<button class="btn btn-default" type="submit" name="sub" data-toggle="modal" data-target="#myModal2"><b>Create new Team</b></button>
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



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Board</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">
        <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="" >
        </div> 
                <div class="form-group">
        <label for="name">Budget</label>
        <div class="input-group">

        <span class="input-group-addon">$</span>
        <input type="text" class="form-control" name="bud" id="bud" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-addon">.00</span>
      </div>       

        </div>
        <div class="form-group">
        <label for="team">Team</label>
        <select name="board" id="boardSelect" class="form-control" >                
        <option value="">(none)</option>
        <?php

                 $board->ListAllTeams($_SESSION['CurrentID']);
                         
        ?>
        </select>
        <br>
        <button type="submit" class="btn btn-success sendbtn" name ="createboard">Create</button>
        </form>
        </div>
      <?php

                  if(isset($_POST["createboard"])){
                  $board = new board();
                  $board->newBoard($_SESSION['CurrentID'],$_POST['title'],$_POST['board'],$_POST['bud']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      
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
          <h4 class="modal-title">Create Team</h4>
        </div>
        <div class="modal-body">
        <form id="createboard" method="POST">
        <div class="form-group">
        <label for="name">Name</label><br>
        <input type="text"  name="teamname" size="30" class="form-control" placeholder="Avengers" required>
        </div>
        <div class="form-group">
        <label for="desc">Description</label><br>
        <textarea type="text"  name="description" rows="7"  size="30" class="form-control" placeholder="Team Description"></textarea>
        </div>
        <button type="submit" class="btn btn-success sendbtn" name = "newteam">Create </button>
        </form>
        </div>
         <?php
                  if(isset($_POST["newteam"])){
                  $board = new board();
                  $board->newTeam($_SESSION['CurrentID'],$_POST['teamname'],$_POST['description']);
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
