<?php
require_once'session.php';
require_once'Singleton.php';
require_once'Class_Add.php';
require_once'ActivityComment.php';
require_once 'Singleton.php';
class Activity
{

	private $_SenderId;
	private $_Description;
	private $_ParentId;
	private $_Strategy;
    private $_BoardID;
	function __construct($_Parent,$_Description,$_StrategyId,$_Boardid)
	{
		$this->_SenderId=$_SESSION['CurrentID'];
		$this->_ParentId=$_Parent;
		$this->_Description=$_Description;
        $this->_BoardID=$_Boardid;
		switch ($_StrategyId) {
			case '0':
				$this->_Strategy=new ActivityComment($this->_Description,$this->_SenderId,$this->_BoardID);
				break;
			case '1':
                            
				break;
			case '2':
				//$this->_Strategy=new ActivityCheckList();
				break;
			case '3':
				//$this->_Strategy=new ActivityDueDate();
				break;

		}


	}

        public function GetActivity($_BoardID)
        {
            
            	$_DB=Singleton::getInstance();
		$_MySQL=$_DB->getConnection();
                $_SQL="SELECT * FROM user_activity WHERE user_id=".$_SESSION['CurrentID']."";  
                $_Result=$_MySQL->query($_SQL);
                $_Actv;
                foreach($_Result as $_Row)
                {
                    echo $_Row['user_id'].'<br/>';
                
                    $_Actv=$_Row['activty_id'];
                    $_SQL2="SELECT * FROM activity_log WHERE id=$_Actv";
                    $_Result2=$_MySQL->query($_SQL2);
                    foreach($_Result2 as $_Rows)
                    {
                        echo $_Rows['name'].'<br/>';
                    }
                }
                //echo $_Actv;
                //echo $_Result['activty_id'];
        }

}

//$Actv=new Activity(0,"da 3obra 3an comment tafseyly",0,1);
//$Actv->GetActivity();
//$Acti=new ActivityComment("sadakj",'12');
?>