<?php

require 'menu.php';
require 'config.php';

?>
<!DOCTYPE>
<html>
	<head>
		<title>Admin Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		
		<div class="row">

			<div class="col-75">
				<div class="container">
					<center><h2>Make a publication</h2></center>
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-50">
								<label>title:</label>
								<input type="text" name="title" id="title"placeholder="Enter title">

								<label>Comment:</label>
								<textarea name="text" height="300px" id="comment"></textarea>

								<label>Image:</label>
								<input type="file" name="image" id="image">
								<br><br>

								<label>Website Link:</label>
								<input type="text" name="link" id="link" placeholder="www.example.com">

								<label>Email or Contact:</label>
								<input type="text" name="contact" id="contact" placeholder="john@gmail.com or 8989878767">

						
							</div>
						</div>
						<input type="submit" name="submit" value="POST" class="btn">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
error_reporting(E_ALL);
	if(isset($_POST['submit'])){
		$title = addslashes($_POST['title']);
    	$datep=date('y-m-d');
    	$comment=addslashes($_POST['text']);
    	$link=addslashes($_POST['link']);
    	$contact=addslashes($_POST['contact']);

    	
      		$image_path = $_FILES["image"]["tmp_name"]; 
        	if($image_path!=""){
        		$img_binary = fread(fopen($image_path, "r"), filesize($image_path));
        		$image=base64_encode($img_binary);
        	$insert=mysqli_query($conn,"INSERT INTO movie(title,comment,image,website,contact,datep,userid)VALUES('$title','$comment','$image','$link','$contact','$datep','$userid')");	
      		if($insert){
       			echo "<script language='javascript'>";
        		echo "document.location.replace('./home.php')";
        		echo "</script>";
			}
      		else{
        		echo $conn->error;
      		}
     
    }
	

}

		?>	

				

			
