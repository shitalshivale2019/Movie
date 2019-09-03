<?php

require 'menu.php';
require'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Manage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<section class="header">
			<div class="box">
				<h2>Manage Post</h2>
				<form method = "POST" action=""  enctype="multipart/form-data">
					<div class="input-box">
						<input type="text" name="postid">
						<label>Enter post No</label>
					</div>
					<input class="submit" type="submit" name="submit" value="Manage">
				</form>
				
			</div>	
		</section>
	</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$postid=$_POST['postid'];

		$select=mysqli_query($conn,"SELECT * FROM movie WHERE id='$postid'");
		if($select){
			while($row=mysqli_fetch_assoc($select)){
				$pid=$row['id'];
				$title=$row['title'];
				$comment=$row['comment'];
				$website=$row['website'];
				$contact=$row['contact'];
				session_start();
				$_SESSION['pid']=$pid;
				//echo $_SESSION['pid'];
				echo "<script language='Javascript'>";
                echo "document.location.replace('./page2.php')";
                echo "</script>";

			}

		}

	}

?>