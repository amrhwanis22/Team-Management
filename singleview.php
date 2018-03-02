
<?php

require_once'Board.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Single | Trello</title>
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
            .list {
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
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-plus"></span> New List</a></li>
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-edit"></span> Change Team</a></li>
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-edit"></span> Change Board Name</a></li>       
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-trash"></span> Delete Board </a></li>      
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-paperclip"></span> Attachment</a></li>
      <li class="active"><a href="#" onclick="window.print();" name="sub" data-toggle="modal" data-target="#"><span class="glyphicon glyphicon-print"></span> Print
      </a></li>
      <li class="active"><a href="#" name="sub" data-toggle="modal" data-target="#myModal"><span class="fa fa-archive"></span> Archive</a></li>

      </ul></div>

<br>
<!-- main -->
<div class="col-sm-8 text-left"> 
<div class="boards-page-board-section mod-no-sidebar">
<div class="boards-page-board-section-header">
 <?php

 require_once'session.php';
 //echo $_SESSION['CurrentID'];
 $id = $_GET["id"];
 $board=new board();
 $board->Getname($id);
 //echo $id;
 

?>


             <?php

 require_once'session.php';
 //echo $_SESSION['CurrentID'];
 $id = $_GET["id"];
 $board=new board();
 $board->GetList($id);
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

<!-- Modal1 -->
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
         <label for="email">Email address</label><br>
         <input name="email" type="email" class="email" id="email" aria-describedby="emailHelp" placeholder="abc@email.com" ><br>
         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>

        <button type="submit" class="btn btn-success sendbtn" name = "addmember">Add </button>
     
      </form>
        </div>
           <?php
        if(isset($_POST["addmember"])){
    $board = new board();
    $board->AddMember($_SESSION['CurrentID'],$_GET['id'],$_POST['email']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- Modal 2-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Team</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">

         <div class="form-group">
         <label for="team">Team</label><br>
         <select name="team" id="teamSelect" class="form-control" >                
        <option value="">(none)</option>
                    <?php

                $board = new board();
                $board->ListTeamsBoard($_SESSION['CurrentID']);
                      
        ?>
         </div>
        </select>
        <br>
        <button type="submit" class="btn btn-success sendbtn" name = "addmember">Change </button>
     
      </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </form>
  </div>



<!-- Modal1 -->
    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New List</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">

         <div class="form-group">
         <label for="listname">List name</label><br>
         <input name="listname" type="listname" class="list" id="listname" aria-describedby="emailHelp" placeholder="Time List" ><br>
         </div>

        <button type="submit" class="btn btn-success sendbtn" name = "newlist">Add </button>
     
      </form>
        </div>
           <?php
        if(isset($_POST["newlist"])){
    $board = new board();
    $board->newlist($_GET['id'],$_POST['listname'],$_SESSION['CurrentID']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- boody men awel hena  -->
<!-- Modal3 -->
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit board name</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">

         <div class="form-group">
         <label for="title">Title</label><br>
         <input name="title" type="title" class="email" id="title" aria-describedby="emailHelp" placeholder="Title" ><br>
         </div>

        <button type="submit" class="btn btn-success sendbtn" name = "editboard">Change </button>
     
      </form>
        </div>
           <?php
        if(isset($_POST["editboard"])){
    $board = new board();
    $board->editboard($_GET['id'],$_POST['title']);
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
          <h4 class="modal-title">Delete board confirmation</h4>
        </div>
        <div class="modal-body">
        <form id="createboard"  method="POST">



        <button type="submit" class="btn btn-success sendbtn" name = "deleteBoard">Confirmation </button>
     
      </form>
        </div>
           <?php
        if(isset($_POST["deleteBoard"])){
    $board = new board();
    $board->deleteBoard($_GET['id']);
}
        ?>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- l7ad hena -->
<!-- Modal4 -->
    <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attach Form</h4>
        </div>
        <div class="modal-body">
        <form id="createboard" action="PHP/form_process.php" method="POST">


         <div class="kv-main">
             <hr>
             <div class="form-group">
                 <input id="file-0d" name="Image" form="AddSliderForm" class="file" type="file" data-show-uplodata-show-remove="false" placeholder="Image" value="">
             </div>
         </div>


        <button type="submit" class="btn btn-success sendbtn" name = "upload">Upload </button>
     
      </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


</body>
</html>
