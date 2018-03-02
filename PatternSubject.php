<?php
require_once 'PatternObserver.php';
class PatternSubject extends Subject
{
    private $_Observers=array();
    
    public function __construct() {
    }
    public function Attach(\Observer $_Observer_In) {
        $this->_Observers[]=$_Observer_In;
        
    }

    public function Detach(\Observer $_Observer_In) {
        foreach($this->_Observers as $_Okey=> $_Oval)
        {
            if($_Oval==$_Observer_In)
            {
                unset($this->_Observers[$_Okey]);
            }
        }
    }

    public function Notify($_SQL) {
        foreach($this->_Observers as $_Obs)
        {
            $_Obs->Query($_SQL);
            $_Obs->Update($this);
            
        }
    }
    public function UpdateFav($_NewSql)
    {
        $_Fav=$_NewSql;
        $this->Notify($_NewSql);
    }


}

/*$_PattSub=new PatternSubject();
$_PattObj=new PatternObserver();

$_PattSub->Attach($_PattObj);

  $_PattSub->UpdateFav("SELECT * FROM user");
*/
?>