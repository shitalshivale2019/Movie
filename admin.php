<?php
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
					<center><h2>Admin Registration</h2></center>
					<form action="" method="POST" enctype="multipart/form-data" onsubmit="return Validate()">
						<div class="row">
							<div class="col-50">
								<label>Name:</label>
								<input type="text" name="name" id="name"placeholder="enter your name">

								<label>Profile:</label>
								<input type="file" name="image"id="image">
								<br><br>
								<label>username:</label>
								<input type="text" name="username" id="username" placeholder="john@gmail.com">

								<label>password:</label>
								<input type="password" name="password" id="password"placeholder="*******">
								<br>
								<label>Confirm Password:</label>
								<input type="password" name="password1" id="password1" placeholder="*******">
							</div>
						</div>
						<input type="submit" name="submit" value="Register" class="btn">
					</form>
					<script>
				
						function Validate(){
							var name=document.getElementById('name').value;
						var username=document.getElementById('username').value;
						var password=document.getElementById('password').value;
						var password1=document.getElementById('password1').value;

						var atposition=username.indexOf("@");  
		      			var dotposition=username.lastIndexOf(".");

							if(name=="" || name==null ){
								alert("Name can't be blank");  
		          				return false; 	
							}
							else if(atposition<1 || dotposition<atposition+2 || dotposition+2>=username.length){
								alert("Please enter a valid e-mail address");  
		          				return false; 
							}
							else if(password!=password1){
								alert("Your password should be same");  
		          				return false; 
							}
							else if(password.length<6){
								alert("Password must be at least 6 characters long");  
		          				return false;
							}
							return true;
						}
					</script>
				</div>
			</div>
		</div>
	</body>
</html>
			

				<?php

				error_reporting(E_ALL);
				if(isset($_POST['submit'])){
					$name=addslashes($_POST['name']);
					$username=addslashes($_POST['username']);
					$password=addslashes($_POST['password']);
					$password1=addslashes($_POST['password1']);

					$imagepath=$_FILES['image']['tmp_name'];
					if($password==$password1){
						$pass=md5($password);

						if($imagepath!=""){
                		$img_binary = fread(fopen($imagepath, "r"), filesize($imagepath));
                			$picture = base64_encode($img_binary);

							$insert=mysqli_query($conn,"INSERT INTO admin (name,profile,username,password) VALUES('$name','$picture','$username','$pass')");
							if($insert){
								header('location:Adminlogin.php');
							}
							else{
								echo $conn->error;
							}
						}
					}
				}
				?>

			
		