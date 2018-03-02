<?php
require_once 'CheckList.php';

$link = mysqli_connect("localhost", "root", "", "swe");
session_start();

if ($link->connect_error) {
     die("Connection failed: " . $link->connect_error);
} 
$e = $_SESSION['CurrentUser'];
echo'<h2>Welcome, '.$_SESSION['CurrentUser'].$_SESSION['CurrentID'];
echo "</h2>";
$e = $_SESSION['CurrentUser'];
$ID= $_SESSION['CurrentID'];

if (isset($_POST['status'])) {
    $statusStr = trim($_POST['status']);
    $length = mb_strlen($statusStr);
    $success = false;
    
    if ($length > 0 && $length < 500) {
        $success = $status->insertStatus(array(
                'name' => $e, 
                'image' => 'tonu.jpg', 
                'status' => $statusStr, 
                'timestamp' => time()
                ));
    }
    
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
        echo ($success) ? '{"success":true}' : '{"error":"Error posting status"}';
        exit;
    }
}

$result = $status->getStatusPosts();
define('BASE_URL', 'http://localhost/chapter3/');
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
  <link href="<?=BASE_URL?>styles/styles.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="<?=BASE_URL?>js/status.js"></script>

    </head>
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
    <script>


    </script>
</head>

    <body>
        <div id="container" class="container">

            

                <form id="statusFrom" action="ListIndex.php" method="post" >
                <div class="form-group">
                <h1>Add Comment</h1>
                <textarea type="text"  name="status" rows="2"  size="30" class="form-control" placeholder="Write a comment"></textarea>
                </div>
                <button type="submit" class="btn btn-success sendbtn"  id="submit" name = "submit">Send </button>

                <div id="postStatus" class="postStatus clearer hidden">loading</div>
                </form>


            <ul>
        <?php
        if (is_array($result))
        foreach ($result as $row) {
            echo '
                
                    
                    <div class="content left">
                        <a href="#"><span class="glyphicon glyphicon-user"></span> ' . $row['name'] . '</a>
                        <div class="status"> <input type="checkbox" id="subscribeNews" name="subscribe"> '  . $row['status'] . '</div>
                        <span class="localtime" data-timestamp="' . $row['timestamp'] . '"></span>
                    </div>
                    <div class="clearer"></div>
                
                    ';
        }
        ?>
            </ul>

        </div>
        <div id="statusTemplate" class="hidden">
            <li>
                
                <div class="content left">
                    <a href="#"></a>
                    <div class="status"></div>
                    <span class="localtime"></span>
                </div>
                <div class="clearer"></div>
            </li>
        </div>

    </body>
</html>