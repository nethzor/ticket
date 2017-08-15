<!doctype html>
<?php 
session_start();
 require('../asb/inc/config.php');
	require('../asb/inc/functions.php');
	$db = mysqli_connect("localhost","root","") or die("Unable to connect to database");
	mysqli_select_db($db,'projeklogin') or die("Database could not be found");
	// 'dbconfig/config.php';
	$output = '';
	
	/*Check for authentication otherwise user will be redirects to main.php page.*/
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
<html>
	<head>
		<meta charset="utf-8">
		<title>THEATRE-EVENT</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
		<script type="text/javascript" src="api/jkit.complete/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="api/jkit.complete/jquery.jkit.1.2.16.min.js"></script>		
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
						<a style="float:left"href="index.php" class="navbar-brand">Ticket Sales</a>
					</div>
					<div class="collpase navbar-collapse" id="example">
						<ul class="nav navbar-nav">
							<li ><a href="index.php">HOME</a></li>
							<li><a href="gallery.php">GALLERY</a></li>
							<li class="active"><a href="events.php">EVENTS</a></li>
							<li><a href="contact.php">CONTACT</a></li>
							
							
						</ul>

					</div>
						<button type="submit" class="btn btn-primary">Search</button>
						<!--<input type="text" name="email" id="email" size="36" value="<?php echo $_SESSION['newsletterSignup'];?>"" />!-->
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
						
					<li style="float:right;font-size:1.0em;padding-top:10px"><a href="#"><i class="fa fa fa-shopping-cart fa-2x"></i>(0)</a></li>
				</div>
					

			</div>
		
				
		</header>
		
		<?php
						
		?>
				
	</body>
	 <?php 
		
		
		
	?>
</html>