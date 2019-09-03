
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php
		session_start();
			if(isset($_SESSION['id'])){
				
				$userid=$_SESSION['id'];
				require 'config.php';
			
	
		$query = mysqli_query($conn, "SELECT * FROM admin WHERE id='$userid'");
		    $rows = mysqli_num_rows($query);
		    if($rows!=0){
		 		while($pict = mysqli_fetch_assoc($query)) {
		    		$id = $pict['id'];
		    		$name = $pict['name'];
		    		$image = $pict['profile'];
            		$email=$pict['username'];

		  ?>
		<ul>
			<li><a href="home.php">HOME</a></li>
			<li><a href="publish.php">PUBLISH</a></li>
			<li><a href="page1.php">MANAGE PUBLICATION</a></li>
			<li><a href="logout.php" class="logout">LOGOUT</a></li>
		</ul>
		<?php
			//echo "<img src=data:image/jpg;base64,$image class='avatar'>";
			}
			}
		}
		else{
			echo "<script language='Javascript'>";
		 	echo "document.location.replace('./Adminlogin.php')";
		 	echo "</script>";
			}
	 ?>
	</body>
</html>



			