<?php
require_once'Singleton.php';
require_once'Class_Add.php';
class ActivityComment implements Add    
{
	private $_Comment;
	private $_SenderId;
	private $_DB;
	private $_MySQL;
	private $_Result;
	private $_SQL;
	private $_ParentId;
    private $_BoardID;
	private  $_Type='comment';
    private $_Count;
	public function __construct($_Description,$_SenderId,$_BoardID)
	{

		 $this->_Comment=$_Description;
		 $this->_SenderId=$_SenderId;
         $this->_BoardID=$_BoardID;
		 $this->_ParentId=null;
         $this->Add();

	}
	public function Add()
	{

		$_DB=Database::getInstance();
		$_MySQL=$_DB->getConnection();
                $_SQL1="SELECT parent_id FROM activity_log WHERE name='$this->_Type'";
                echo $_SQL1;
                $_Result=$_MySQL->query($_SQL1);
                
                   if($_Result->num_rows==0)
                {
                    echo "de fadya";
                    $_SQL1="INSERT INTO activity_log(name,seen_unseen) VALUES('comment','0')";
                    $_Result1=$_MySQL->query($_SQL1);
                
                }   else{
                        
                        echo 'de malyna';
                    }
                    
             
            
                
                
                
                
                
          /*     $_Count= mysql_num_rows($_Result);
               echo $_Count;
                if(mysql_num_rows($_Result)== 0)
                {
                    $_SQL1="INSERT INTO activity_log(name,seen_unseen) VALUES('comment','0')";
                    $_Result1=$_MySQL->query($_SQL1);*/
               /*      echo 'The parent comment is inserted now';
                     
                }
                else
                {
               
                   /* echo 'there is a parrent comment already';
                    
                    $_SQL2="INSERT INTO activity_log(name,parent_id,seen_unseen) VALUES('$this->_Comment','0')";
                    
                    $_Result2=$_MySQL->query($_SQL2);
                    $_SQL3="SELECT MAX(id) FROM activity_log";
                    $_Result3=$_MySQL->query($_SQL3);
                    $_ActID;
                    foreach($_Result3 as $_Row)
                    {
                       foreach($_Row as $_Key)
                       {
                           $_ActID=$_Key;       
                       }
                    }
                    
                    
                    $_SQL3="INSERT INTO user_activity(user_id,activty_id,board_id) VALUES(".$_SESSION['CurrentID'].",'$_ActID','$this->_BoardID')";
                   
                    $_Result4=$_MySQL->query($_SQL3);
                   
                    echo 'the new comment is inserted by'.$this->_SenderId;

                    */
                }
             /*   $_com='comment';
                $_SQL2="SELECT parent_id WHERE name=$_com";
                    $_Result2=$_MySQL->query($_SQL2);
                    foreach($_Result2 as $Row)
                    {
                        echo $Row;
                    }*/
	}



?>