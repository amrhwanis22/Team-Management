<?php
require_once'Singleton.php';
class _20Query{

	private $_SQL;
	public function __construct()
	{
      
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