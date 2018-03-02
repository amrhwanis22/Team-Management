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
      <form action="NotifyMe.php" >
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

  <input type="submit" name="sub"/>
      </form>
     

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