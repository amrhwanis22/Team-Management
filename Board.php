<?php

     require_once'session.php';
     require_once'Query.php';


class board{   

    
        public function is_loggedin()
    {
        if(isset($_SESSION['CurrentUser']))
        {
            return true;
        }
    }
      public function Query($_SQL)
   {
      $_DB= Database::getInstance();
      $_MySQL=$_DB->getConnection();
      $this->_SQL=$_SQL;
      $_Result=$_MySQL->query($this->_SQL);
      return $_Result;
   }


    public function ListALLBoard($id)
    {

        $sql="SELECT * FROM board WHERE board.teamleaderid = $id AND type = 'board' ";
        //board.id = boarduser.bid AND 
        $result = new Query($sql);
         echo'<div class="w3-container">';
         
        foreach($result as $row)
        {


            $id = $row['id'];
            echo' <a href="singleview.php?id='.$id.'" class="btn btn-primary btn-lg">'.$row['name'].'</a>';
            echo'&nbsp;';
            echo'&nbsp;';
       }
             echo'</div>';
             
    }
    
    
    public function ListAllTeams($id)
    {

         
        $sql="SELECT * FROM team WHERE uid= $id";
        //SELECT * FROM team, team-board WHERE team.id = team-board.tid AND uid= $id
        $result = new Query($sql);

        
        foreach($result as $row)
        {
            
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

        }
        
    }

    public function ListTeamsBoard($id)
    {

         
        $sql="SELECT * FROM team,teamuser WHERE teamuser.tid = team.id AND teamuser.uid = $id ";
        //SELECT * FROM team, team-board WHERE team.id = team-board.tid AND uid= $id
        $result = new Query($sql);

        
        foreach($result as $row)
        {
            
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

        }

        $sql="SELECT * FROM team WHERE uid = $id";
        //SELECT * FROM team, team-board WHERE team.id = team-board.tid AND uid= $id
        $result = new Query($sql);

        
        foreach($result as $row)
        {
            
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

        }
        
    }

    public function AllTeams()
    {


        $sql="SELECT * FROM team WHERE uid=".$_SESSION['CurrentID']."";
        $result = new Query($sql);
         echo'<div class="w3-container">';

        foreach($result as $row)
        {
            
            $id = $row['id'];
            echo' <a href="teamview.php?id='.$id.'" class="btn btn-primary btn-lg">'.$row['name'].'</a>';
            echo'&nbsp;';
            echo'&nbsp;';
            


        }
        echo'</div>';
    }


    public function notification($uid)
    {


        $sql="SELECT * FROM notification WHERE reciver_id = $uid AND seen_unseen =0";
        $result = new Query($sql);
         echo '    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
         echo '<li class="dropdown-header">Check to marked as seen </li>';
        foreach($result as $row)
        {
            $id=$row['id'];
            echo '<li role="presentation">'.'<a>'.'<input type="checkbox" id="mycheckbox" name="mycheckbox" value="mycheckbox">'.$row['description'].'</a>'.'</li>';



        }
        echo'</ul>';
        $sql="SELECT count(*) FROM notification WHERE reciver_id = $uid AND seen_unseen =0";
        $result = new Query($sql);
        foreach($result as $row)
        {
            echo '<span class="badge">'.$row['count(*)'].'</span>';

        }
        
    }

    public function GetBoardMembers($id)
    { 


 		$sql="SELECT * FROM user,boarduser WHERE  boarduser.uid = user.id AND boarduser.bid = $id ";

  		$result = new Query($sql);
        echo'<div class="container">';

        foreach($result as $rows)
         {
              echo '<h4>'.$rows['name'].'</h4>';

         }  
 			echo '</div>';

    }
    public function AddMember($id,$bid,$email)
    {


        $sql="SELECT * FROM user WHERE email = '$email'";
        $result = new Query($sql);
        $new;
        foreach($result as $rows)
         {
             echo $rows['id'];
              $new=$rows['id'];

         }
        $sql1="INSERT INTO `boarduser`( `bid` ,`uid`) VALUES ('$bid','$new')";

        $result1 = new Query($sql1);

        $sql3="SELECT * FROM board WHERE id = '$bid'";
        $result3 = new Query($sql3);
        $name;
        foreach($result3 as $rows3)
         {
              $name=$rows3['name'];

         }


        $sql="INSERT INTO `notification`( `description` ,`sender_id`,`reciver_id`) VALUES ('You have been added in $name','$id','$new')";

        $result = new Query($sql);

        echo "<meta http-equiv='refresh' content='0.0'>";



            
    }

    public function newMember($tid,$email)
    {       


        $sql="SELECT * FROM user WHERE email = '$email'";
        $result = new Query($sql);

        foreach($result as $rows)
         {
            // echo $rows['id'];
              $new=$rows['id'];

         }
        $sql1="INSERT INTO `teamuser`( `tid` ,`uid`) VALUES ('$tid','$new')";

        $result1 = new Query($sql1);

        echo "<meta http-equiv='refresh' content='0.0'>";
            
    }

    public function createboard($title,$tid,$uid)
    {

        $sql = "INSERT INTO `board`(`name`, `teamleaderid`,`type`) VALUES ('$title','$uid','board')";
            

            //$SQL1 = "INSERT INTO `team-board`(`tid`, `bid`) VALUES ('1','6')";

        
        $result = new Query($sql);
        $sql1 ="SELECT * FROM board";
        $result1 = new Query($sql1);
        $id;
        foreach($result1 as $rows)
        {
             $lastid =$rows['id'];

        }

        $sql2 = "INSERT INTO `teamboard`(`tid`, `bid`) VALUES ('$tid','$lastid')";
        $result2 = new Query($sql2);
        echo "<meta http-equiv='refresh' content='0.0'>";

            
    }

        public function newTeam($id,$name,$description)
    {


            //$name = $_POST['name'];
            //$desc = $_POST['desc'];

            $sql = "INSERT INTO `team`(`name`, `uid`,`description`) VALUES ('$name','$id','$description')";
            //$sql1 = "INSERT INTO `team-board`(`tid`, `bid`) VALUES ('1','6')";

        
        $result = new Query($sql);
        $sql1 ="SELECT * FROM board";
        $result1 = new Query($sql1);
        $id;
        foreach($result1 as $rows)
        {
             $lastid =$rows['id'];

        }
        echo "<meta http-equiv='refresh' content='0.0'>";
            
            
            
    }
        public function newBoard($id,$title,$team,$budget)
    {


            //$name = $_POST['name'];
            //$desc = $_POST['desc'];

        $sql = "INSERT INTO `board`(`name`, `teamleaderid`,`budget` , `type`) VALUES ('$title','$id','$budget','board')";
            

            //$SQL1 = "INSERT INTO `team-board`(`tid`, `bid`) VALUES ('1','6')";

        
        $result = new Query($sql);
        $sql1 ="SELECT * FROM board";
        $result1 = new Query($sql1);
        $id;
        foreach($result1 as $rows)
        {
             $lastid =$rows['id'];

        }
        echo "<meta http-equiv='refresh' content='0.0'>";

        $sql2 = "INSERT INTO `teamboard`(`tid`, `bid`) VALUES ('$team','$lastid')";
        $result2=new Query($sql2);



            
    }

    public function user($id)
    {

        $sql="SELECT * FROM user WHERE id = ".$_SESSION['CurrentID']."";
        $result1 = new _20Query();
        $result1->Query($sql);        
        $new;
        foreach($result1 as $rows)
         {
             
              $new = $rows['name'];

         }


       echo  '<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> Signed in as '.$_SESSION['CurrentUser'].'</p>';

        
        
    }

        public function url($id)
    {

        $sql="SELECT * FROM userurl,url WHERE userurl.uid = '$id' AND   userurl.urlid = url.id  ";
        $result1 = new _20Query();

        $result1->Query($sql);

        foreach($result1 as $rows)
         {
                echo'    <li ><a href="'.$rows['path'].'">'.$rows['name'].'</a></li>';

         }
        
        
    }

        public function admin($id)
    {

        $sql="SELECT * FROM user WHERE id = '$id'";
        $result1 = new Query($sql);
        
      $new;
        foreach($result1 as $rows)
         {
              $new = $rows['name'];
         }
        
         echo  '<h3 class="boards-page-board-section-header-name">Welcome Admin, '. $new.' </h3>';
      }

    public function GetTeamMembers($id)
    { 

        $sql="SELECT * FROM user,teamuser WHERE  teamuser.uid = user.id AND teamuser.tid = $id ";

        $result = new Query($sql);
        echo'<div class="container">';

        foreach($result as $rows)
         {
              echo '<h4 id="username">'.$rows['name'].'</h4>';

         }  
            echo '</div>';

    }   

    public function GetBoard($id)
    { 
          

        $sql="SELECT * FROM board,teamboard WHERE  teamboard.bid = board.id AND teamboard.tid = $id ";

        $result = new Query($sql);

         echo'<div class="w3-container">';
         
        foreach($result as $row)
        {


            $id = $row['id'];
            echo' <a href="singleview.php?id='.$id.'" class="btn btn-primary btn-lg">'.$row['name'].'</a>';
                        echo'&nbsp;';
            echo'&nbsp;';
       }
             echo'</div>';


    }
        public function GetList($id)
    {


        $sql="SELECT * FROM board WHERE board.parent_id = $id ";
        //board.id = boarduser.bid AND 
        $result = new Query($sql);


        foreach($result as $row)
        {
        echo'<div class="lists">
           <div class="panel panel-primary">';
                    
          echo '<div class="panel-heading">'.$row['name'].'</div>';
          echo'<div class="panel-body"><a href="cardview.php?id='.$row['id'].'" class="btn btn-default btn-sl"><span class="glyphicon glyphicon-plus"></span> Add a Card</a></div>';
          echo' </div>
                </div>';

       }

   }

    public function GetListname($id)

    {


        $sql="SELECT * FROM board WHERE board.id = $id ";
        $result = new Query($sql);

         
        foreach($result as $row)
        {
                    echo  '<h3 class="boards-page-board-section-header-name">'. $row['name'].' </h3>';


       }
             

             
    }

            public function Getname($id)
    {


        $sql="SELECT * FROM board WHERE board.id = $id ";
        $result = new Query($sql);

         
        foreach($result as $row)
        {
                    echo  '<h3 class="boards-page-board-section-header-name">'. $row['name'].' </h3>';


       }
             

             
    }

        public function comment($id)
    {


        $sql="SELECT * FROM activity_log WHERE parent_id = $id ";
        $result = new Query($sql);

         
        foreach($result as $row)
        {
                    echo  '<p>'. $row['name'].' </p>';
       }
             

             
    }

        public function editBoard($id,$name)
    {


        $sql =" UPDATE board SET name = '$name' WHERE id = '$id'";
        
        $result = new Query($sql);

        echo "<meta http-equiv='refresh' content='0.0'>";

            
    }
     
        public function deleteBoard($id)
    {


        $sql =" DELETE FROM board  WHERE id = '$id'";
        $sql1 =" DELETE FROM boarduser  WHERE bid = '$id'";
        $sql2 =" DELETE FROM teamboard  WHERE bid = '$id'"; 
        $sql3 =" DELETE FROM board  WHERE parent_id = '$id'";
       
        
        $result = new Query($sql);
        $result = new Query($sql1);
        $result = new Query($sql2);
        $result = new Query($sql3);

        header("location:index.php");
    
            
    }


        public function editTeam($id,$name)
    {


        $sql =" UPDATE team SET name = '$name' WHERE id = '$id'";
        
        $result = new Query($sql);

        echo "<meta http-equiv='refresh' content='0.0'>";

            
    }

            public function deleteTeam($id)
    {


        $sql = " DELETE FROM team  WHERE id = '$id'";
        $sql1 =" DELETE FROM teamuser  WHERE tid = '$id'";
        $sql2 =" DELETE FROM teamboard  WHERE tid = '$id'";
        
        $result = new Query($sql);
        $result = new Query($sql1);
        $result = new Query($sql2);

        echo "<meta http-equiv='refresh' content='0.0'>";

            
    }



            public function newlist($id,$title,$teamleaderid)
    {


        $sql = "INSERT INTO `board`(`name`, `teamleaderid`,`parent_id`,`type`) VALUES ('$title','$teamleaderid','$id','list')";
            
        
        $result = new Query($sql);
        
        echo "<meta http-equiv='refresh' content='0.0'>";

            
    }       
            public function addCheckList($title)
    {



        $sql1="INSERT INTO `cardlist`( `checked` ,`description`) VALUES ('0','$title')";

        $result1 = new Query($sql1);
        echo "<meta http-equiv='refresh' content='0.0'>";




            
    }
      public function GetCheckList()
    {


        $sql="SELECT * FROM cardlist ";
        $result = new Query($sql);


        foreach($result as $row)
        {
            $id = $row['id'];
            if($row['checked']==0){
            
             echo' <a href="checkView.php?id='.$id.'" class="btn btn-primary btn-lg">'.$row['description'].'</a>';
            echo'&nbsp;';
            echo'&nbsp;';
        }
        else{
            echo' <a href="checkView.php?id='.$id.'" class="btn btn-success btn-lg">'.$row['description'].'</a>';
            echo'&nbsp;';
            echo'&nbsp;';

        }
            


        }
        echo'</div>';

        }
    
   public function ChangeCheckList($id)
   {
    $sql1=" UPDATE cardlist SET checked = '1' WHERE id = $id";

        $result1 = new Query($sql1);


   }
}


?>