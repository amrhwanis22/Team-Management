<?php
$conn = mysqli_connect("localhost", "root", "", "swe");

if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
	
	class File{

		private $_suporttedFormats = ['application/pdf'];

		public function uploadFile($file)
		{
			if(is_array($file))
			{
				//continue
				if(in_array($file['type'],$this->_suporttedFormats))
				{
					$conn = mysqli_connect("localhost", "root", "", "swe");
					//continue
					$success = move_uploaded_file(
					$_FILES["file"]["tmp_name"],dirname(__FILE__)."/"."uploads"."/".
					$_FILES['file']['name']) or die();
					$imagename = "uploads"."/".$_FILES['file']['name'];

					$sql = "INSERT INTO image 'image_content' VALUES ('$imagename')";

					

			$result = mysqli_query($conn, $sql);

			header("location:index.php");

				}
				else{
					die('Format not supported');

				}

			}
			else{
				die('File Not Uploaded');

			}


		}
	}

?>