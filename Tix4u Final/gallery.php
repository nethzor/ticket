<?php
	session_start();
	require 'dbconfig/config.php';
	$output = '';
	
	if (isset($_SESSION['UserData'])) 
	{	/*XXXXXXAAAANNNNDRRREEEEEEEEEE
		CHANGE to !isSet and edit header location*/
		//exit(header("location:index.php"));
		$action = "../asb/logout.php"; 
	}
	else
	{
		$action = "../asb/main.php"; 
	}
	
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>GALLERY</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		
		<script type="text/javascript" src="api/jkit.complete/jquery-1.9.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
		<script type="text/javascript">
		$(document).ready(function(){
			$('body').jKit();
		});
		</script>
	</head>

	 
	
	<body>
	
		<header>
			<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a style="float:left"href="index.php" class="navbar-brand">Tix4u</a>
					</div>
					<div class="collpase navbar-collapse" id="example">
						<ul class="nav navbar-nav">
							<li><a href="index.php">HOME</a></li>
							<li class="active"><a href="gallery.php">GALLERY</a></li>
							<li><a href="events.php">EVENTS</a></li>
							<li><a href="contact.php">CONTACT</a></li>
							
							
						</ul>

						

						<form action="searchResults.php" class="navbar-form navbar-right" role="search" id="searchBox" method="post">
						<div class="form-group">
							<input id="searchBoxInput" name="search" type="text" class="form-control" onkeydown="key_down()" placeholder="Search..." autocomplete="off">
							<!--WESSEL!-->
						</div>
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
					<form class="navbar-form navbar-right" action="<?php echo $action; ?>" role="search">
							<button style='margin-right:80px;margin-top:3px;background-color:red;border-color:transparent' type="submit" class="btn btn-primary">
								<?php 
									if (isset($_SESSION['UserData'])) 
									{	/*XXXXXXAAAANNNNDRRREEEEEEEEEE
										CHANGE to !isSet */
										echo 'LOG OUT';
									}
									else
									{
										echo 'LOG IN';
									}
								?>
							</button>
							
						</form>
					
				<li style="font-size:1.0em;padding-top:10px"><a href="#"><i class="fa fa fa-shopping-cart fa-2x"></i>(0)</a></li>
				</div>
						
				
					

				</div>
			</div>
				
		</header>
		
		<div class="container">
				
		
		
				<div class="row">
			  
					
						
						
				</div>
			
				<div class="row">
			  
						
				</div>
			
			
			
			<div class="row">
			  
				
			</div>
			
			<div class="row">
			  
						
						
			</div>
			
			
			
			
			<div class="row">
			  
				
			</div>	

		

  
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>
