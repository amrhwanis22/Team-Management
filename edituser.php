
<?php

require_once'Board.php';
require_once'session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit/Delete User | Trello</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.tabledit.js"></script>
  <link rel="stylesheet" type="text/css" href="js/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="js/font-awesome.css">
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
    
    #main{
        min-height: 100%;
  height: auto !important; /* This line and the next line are not necessary unless you need IE6 support */
  height: 100%;
  padding-bottom: 100px;
  margin: 0 auto 50px; /* the bottom margin is the negative value of the footer's height */

    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
      bottom:0;
      width:100%;
      height:60px; 
      position:relative;
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
<body onload="viewData()">
<!-- navigation bar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>                      
      </button>
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <?php
                $board = new board();
                $board->url($_SESSION['CurrentID']);
          ?>
      </ul>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">




                  <?php
      $board = new board();
      $board->user($_SESSION['CurrentID']);

?>

        <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>

</ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
        </div>
        </form>
    </div>
    </div>
  </div>

</nav>
  
  <!-- main -->
<div id="main" class="container-fluid text-center">    
<div class="row content">
  

<div class="container" style="margin-top:35px">
<h4> Table Quick Edit/Delete </h4>
<table id="tabledit" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th><span class="glyphicon glyphicon-cog"></span></th>
</tr>

</thead>
<tbody>
	
</tbody>

</table>

</div> 





	<script>
	function viewData(){
		$.ajax({
			url: 'PHP/process.php?p=view',
			method: 'GET'

			
		}).done(function(data){
			$('tbody').html(data)
			tableData()
		})
	}
	function tableData(){
		$('#tabledit').Tabledit({
    url: 'PHP/process.php',
    eventType: 'dblclick',
    editButton: true,
    deleteButton: true,
    hideIdentifier: false,
    buttons: {
	    edit: {
	        class: 'btn btn-sm btn-warning',
	        html: '<span class="glyphicon glyphicon-pencil"></span>',
	        action: 'edit'
	    },
	    delete: {
	        class: 'btn btn-sm btn-danger',
	        html: '<span class="glyphicon glyphicon-trash"></span>',
	        action: 'delete'
	    },
	    save: {
	        class: 'btn btn-sm btn-success',
	        html: 'Save'
	    },
	    restore: {
	        class: 'btn btn-sm btn-warning',
	        html: 'Restore',
	        action: 'restore'
	    },
	    confirm: {
	        class: 'btn btn-sm btn-default',
	        html: 'Confirm'
	    }
	},

    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'name'], [2, 'email'], [3, 'mobile']]
    },
    onSuccess: function(data, textStatus, jqXHR) {
    	//viewData()
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    }
});

	}
</script>





  </div>
</div>


<!-- ads -->
<footer class="container-fluid text-center">
  <p>Powered by Amr Hamdi - Hassan Hamdy - Ahmed El Rawy - Abdelrahman Shehata</p>  
</footer>


</body>
</html>
