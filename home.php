<?php
 require 'config.php';
 require'menu.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="container1">
					<?php
					$user=mysqli_query($conn,"SELECT * FROM admin where id='$userid'");
					$userinfo=$user->fetch_assoc();
					$name=$userinfo['name'];
				
					$query="SELECT * FROM movie where  userid='$userid'";
					$result=$conn->query($query);

					$n_post=mysqli_num_rows($result);
			    	
			    	echo"<center><h3>Hello ".$name." You have ".$n_post." post</h3></center>";
			    	echo"<br>";
			 ?>	
		</div>
		<div class="row">
			<?php
				
			$query="SELECT * FROM movie where  userid='$userid'";
			$result=$conn->query($query);
			while($row=mysqli_fetch_array($result)){


				$id=$row['id'];
				$image=$row['image'];
				$title=$row['title'];
				$comment=$row['comment'];
				$datep=$row['datep'];
				$website=$row['website'];
				$contact=$row['contact'];
			 //echo $id."<br>";
			 //echo $image."<br>";
			  //echo $title."<br>";
			   //echo $description."<br>";
			    //echo $dateu."<br>";
			
			?>
				<div class="col-md-4">
					<div class="gallery-box">
						<div class="gallery-img">
							<?php echo "<img src=data:image/jpg;base64,$image>";?>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="gallery-details">
						<h4>Title:<?php echo $title; ?><font color="red"><?php echo"(".$id.")"; ?></font></h4>
						<p>
							<?php echo $comment; ?>
							<a href="<?php echo $website;?>"></a>
						</p>
						<div>
							<span><a href="<?php echo $website;?>"><?php echo $website;?></a></span>
							<span style="float:right;"><font color="green"><?php echo $datep;?></font></span>
						</div>
		
					</div>	
				</div>
					<?php 
							}
						?>
						
		</div>
	</body>
</html>