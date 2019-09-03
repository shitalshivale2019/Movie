<?php

	$conn=mysqli_connect('localhost','root','','Test');
	if(!$conn){
		echo $conn->error;
	}
	else{
		//echo"connected-successfully";
	}
?>