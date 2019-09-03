<?php
 require 'config.php';

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
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
  		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="style.css">
  		<style>
  			body{
  				background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url('sh.jpg');
  				background-size: cover;
  			}
  			.logo{
  				width: 150px;
  				margin-top: 18px;

  			}
  			.header{
  				height: 100%;
  			}
  			.header-btn{
  				text-decoration: none !important;
  				border-radius: 30%;
  				padding:7px 20px;
  				float: right;
  				margin-top: 15px;
  				color: #fff !important;
  				background:#107afd;
  				font-weight: 600; 
  			}
  			.movie-details{
  				margin: 3% 0;
  			}
  			.left-box{
  				color:#fff;
  				margin: 15px 0;
  				padding: 20px;
  			}
  			
  			.casting img{
  				height:40px;
  				width: 40px;
  				margin-right: 10px;
  				cursor: pointer;
  			}
  			.movie-img{
  				height:350px;
  				box-shadow: -4px  4px 5px 0 #fff;

  			}
  			.series{
  				color:#fff;
  				margin: 15px 0;
  			}
  			.series img{
  				width:100%;

  			}
  			@media only screen and (min-width: 760px){
  				body{
  					width: 100%;
  					box-sizing: border-box;
  					padding: 0;
  				}
  			}
  		</style>
	</head>
	<body>
		<div class="main-container header">
			<div class="row">
				<div class="col-md-2">
			<h1 style="background-image:linear-gradient(red,black);color:black; border-radius: 50%;height:70%;width:80%;margin-left:20%;padding-top:20px;">Filmy katta</h1>
			    </div>
			    <div class="col-md-7">
			    	<h1 style="color:red;margin-right:90%;font-size:650%;"><strong style="color:red;font-size:150%;">C</strong>ine<strong style="color:red;font-size:150%;">W</strong>orld...</h1>
			    </div>
			    <div class="col-md-3" style="color:white;margin-top:5%;">
			    	<h4>Email:shivaleshital98@gmail.com</h4>
			    	<h4>Contact:+91 9146471225</h4>
			    </div>
		    </div>
		</div>
		<!--<div class="main-container movie-details">
			<div class="row">
				<div class="col-md-6 left-box">
					<h1>SAAHO</h1>	
					<p style="margin-left: 50%;">Cast:</p>
					<div class="casting" style="margin-left:30%;">
						<img src="p.jpeg" title="prabhas">
						<img src="s.jpeg" title="Shraddha">
						<img src="nn.jpeg" title="Neil nitin mukesh">
						<img src="j.jpeg" title="jocky shroff">
						<img src="c.jpeg" title="chunky pandey">
						<img src="mm.jpeg" title="Mahesh Manjarekar">
						<img src="m.jpeg" title="Mandire Bedi">
					</div>
				</div>
				<div class="col-md-6 text-center">
					<img src="7.jpeg" class="movie img">
				</div>
			</div>
		</div>
		<div class="main-container series">
			<h3>Popular Movies</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6"><img src="6.jpeg" title="spider-man"></div>
						<div class="col-md-6"><img src="3.jpeg" title="Avengers"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6"><img src="11.jpeg" title="Lagan"></div>
						<div class="col-md-6"><img src="5.jpeg" title="Fast & Furious"></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-6"><img src="7.jpeg" title="Saho"></div>
						<div class="col-md-6"><img src="9.jpeg" title="Harry Potter" height="100%"></div>
					</div>
				</div>
			</div>
		</div>-->

		<div class="container1">
			<h1 style="color:white;">Latest News:</h1>
			<div class="row">
			<?php
				
			$query="SELECT * FROM movie";
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
						<h1 style="color:#fff;"><b><u><?php echo $title; ?></u></b></h1>
						<p style="color:#fff;">
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
		</div>
	</body>
</html>