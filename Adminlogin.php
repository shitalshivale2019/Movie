<!DOCTYPE html>
<html>
	<head>
		<title>AdminLogin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<section class="header">
			<div class="box">
				<h2>Login</h2>
				<form method = "POST" action="" onsubmit="return Validate()" enctype="multipart/form-data">
					<div class="input-box">
						<input type="text" name="username" required="">
						<label>Username</label>
					</div>
					<div class="input-box">
						<input type="password" name="password" required="">
						<label>Password</label>
					</div>
					<input class="submit" type="submit" name="submit" value="Login">
				</form>
				<hr>
				  	<p style="color: white;">Or <a href = "admin.php">Sign Up</a> if you don't have an account</p>
			</div>	
		</section>
		<script type="text/javascript">
			function Validate() {
				var atposition=username.indexOf("@");  
		      	var dotposition=username.lastIndexOf(".");
		      	var password=document.getElementById('password').value;

		      	if(atposition<1 || dotposition<atposition+2 || dotposition+2>=username.length){
					alert("Please enter a valid e-mail address");  
		          	return false; 
				}
				else if(password.length<6){
					alert("Password must be at least 6 characters long");  
		          	return false;
				}
				return true;
			}

		</script>
		<?php
			require 'config.php';
			if(isset($_POST['submit'])){
				$username=addslashes($_POST['username']);
				$password=addslashes(md5($_POST['password']));

				$select=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'");

				$num=mysqli_num_rows($select);
				if($select){
					if($num==1){
						session_start();
						$userinfo=$select->fetch_assoc();
						$userid=$userinfo['id'];
						echo $userid;
						$_SESSION['id']=$userid;
						echo "<script>";
						echo "document.location.replace('./home.php')";
						echo "</script>";
					}
					else{
						echo "<script language='Javascript'>";
						echo "alert('wrong password')";
						echo "</script>";
					
					}
				}else{
					echo $conn->error;
				}

			}

		?>
	</body>
</html>