<?php
	require_once 'class.file.php';
	

	$fileupload = new File();

	if(isset($_FILES['file']))
	{

		$fileupload->uploadFile($_FILES['file']);

	}
	else {
		die('file not submitted');

	}

?>