<?php

//CREDENTIALS FOR DB
define ('DBSERVER', 'localhost');
define ('DBUSER', 'root');
define ('DBPASS','');
define ('DBNAME','swe');

//LET'S INITIATE CONNECT TO DB
$connection = mysql_connect(DBSERVER, DBUSER, DBPASS) or die("Can't connect to server. Please check credentials and try again");
$result = mysql_select_db(DBNAME) or die("Can't select database. Please check DB name and try again");

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysql_query ("SELECT email FROM user WHERE email LIKE '{$query}%' ");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'value' => $row['email']            
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>