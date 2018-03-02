<?php
$mysqli = new mysqli('localhost', 'root', '', 'swe');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}


$page= isset($_GET['p'])? $_GET['p']:'';
if($page=='view'){
 $result =$mysqli->query("SELECT * FROM board WHERE deleted!='1' AND type= 'board' ");

//AND parent_id = 'NULL'


$counter=1;
 while($row =$result->fetch_assoc()){
 	echo'<tr>';
 	echo'<td>'.$counter++.'</td>';
 	echo'<td>'.$row['name'].'</td>';
 	echo'</tr>';
 	
 }

}
else{
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

	header('Content-Type: application/json');

	$input = filter_input_array(INPUT_POST);


	if ($input['action'] == 'edit') {
	    $mysqli->query("UPDATE board SET name='" . $input['name'] . "' WHERE id='" . $input['id'] . "'");
	} else if ($input['action'] == 'delete') {
	    $mysqli->query("UPDATE board SET deleted=1 WHERE id='" . $input['id'] . "'");
	} else if ($input['action'] == 'restore') {
	    $mysqli->query("UPDATE board SET deleted=0 WHERE id='" . $input['id'] . "'");
	}

	mysqli_close($mysqli);

	echo json_encode($input);
}
?>