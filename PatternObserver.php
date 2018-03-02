<?php
require_once 'Observer.php';
require_once 'PatternSubject.php';
require_once 'Singleton.php';
abstract class Subject
{
    private $_SQL;
   abstract function Attach(Observer $_Observer_In);
   abstract function Detach(Observer $_Observer_In);
   abstract function Notify($_SQL);
   

    
}
class PatternObserver extends Observer
{
    public function __construct() {
         
   
    }
       
   public function Update(\Subject $_Subject_In) {
       
      
       
       $_Result=$this->Query($this->_SQL);
         echo '    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">';
         //echo '<li class="dropdown-header">Check to marked as seen </li>';
       foreach($_Result as $_Row)
       {            
                    echo '<button name="notify">'.'<a href="">'.$_Row['description'].'</a>'.'</button>';
                    echo '<br>';

       }
               echo'</ul>';
   

    }
       public function Query($_SQL)
   {
      $_DB= Database::getInstance();
      $_MySQL=$_DB->getConnection();
      $this->_SQL=$_SQL;
      $_Result=$_MySQL->query($this->_SQL);
      return $_Result;
   }

}
?>