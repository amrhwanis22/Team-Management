<?php
$mysqli = new mysqli('localhost', 'root', '', 'swe');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}


$page= isset($_GET['p'])? $_GET['p']:'';
if($page=='view'){
 $result =$mysqli->query("SELECT * FROM user WHERE deleted!='1'");




$counter=1;
 while($row =$result->fetch_assoc()){
 	echo'<tr>';
 	echo'<td>'.$counter++.'</td>';
 	echo'<td>'.$row['name'].'</td>';
 	echo'<td>'.$row['email'].'</td>';
 	echo'<td>'.$row['mobile'].'</td>';
 	echo'</tr>';
 	
 }

}
else{
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

	header('Content-Type: application/json');

	$input = filter_input_array(INPUT_POST);

$ss ="ay haga";
$a ="ay kalam fady";
$ib ="3la allah";

	if ($input['action'] == 'edit') {
	    $mysqli->query("UPDATE user SET name='" . $input['name'] . "', email='" . $input['email'] . "', mobile='" . $input['mobile'] . "' WHERE id='" . $input['id'] . "'");
	} else if ($input['action'] == 'delete') {
	    $mysqli->query("UPDATE user SET deleted=1 WHERE id='" . $input['id'] . "'");
	} else if ($input['action'] == 'restore') {
	    $mysqli->query("UPDATE user SET deleted=0 WHERE id='" . $input['id'] . "'");
	}

	mysqli_close($mysqli);

	echo json_encode($input);
}
?>