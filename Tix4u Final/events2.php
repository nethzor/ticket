<!doctype html>
<?php 
 $db = mysqli_connect("localhost","root","") or die("Unable to connect to database");
	mysqli_select_db($db,'projeklogin') or die("Database could not be found");	
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>EVENTS</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/Eanimate.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="api/jkit.complete/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="api/jkit.complete/jquery.jkit.1.2.16.min.js"></script>
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
						<a style="float:left"href="index.php" class="navbar-brand">Ticket Sales</a>
					</div>
					<div class="collpase navbar-collapse" id="example">
						<ul class="nav navbar-nav">
							<li ><a href="index.php">HOME</a></li>
							<li><a href="gallery.php">GALLERY</a></li>
							<li class="active"><a href="events.php">EVENTS</a></li>
							<li><a href="contact.php">CONTACT</a></li>
							<li><a href="#">Log In</a></li>
							
						</ul>

						

						<form action="" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search...">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
						</form>
						
					<li style="float:right;font-size:1.0em;padding-top:10px"><a href="#"><i class="fa fa fa-shopping-cart fa-2x"></i>(0)</a></li>
					</div>
					

				</div>
			</div>
				
		</header>
				
		<div class="container" style="margin-top:100px">
			<center>
				<h2 style="padding-bottom=5px">Featured Events</h2>
			</center>
			<div class="row">			  
				
						
						<?php
						$query = "SELECT * FROM events";
						mysqli_query($db, $query) or die('Error querying database.');

						$result = mysqli_query($db, $query);
						$row = mysqli_fetch_array($result);						
						//$row['id'] . ' ' . $eventName = $row['eventName'] . ' ' . $eventDescription = $row['eventDescription'] . ' ' . $eventCategory = $row['eventCategory'] . ' ' . $eventLink = $row['eventLink'] . ' ' . $eventPrice=  $row['eventPrice'] . ' ' . $eventDate = $row['eventDate'] .'<br />';	
						$eventName = $row['eventName'];
						$eventDescription = $row['eventDescription'];
						$eventCategory = $row['eventCategory'];
						$eventLink = $row['eventLink'];
						$eventPrice = $row['eventPrice'];
						$eventDate = $row['eventDate'];
						$eventsPhotoLink = $row['eventsPhotoLink'];
						$output .= '
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div>
									<a href="'.$eventLink.'"><span>'.$eventName.'</span></a>
									<h3>From R'.$eventPrice.'</h3>
									
								</div>
									<img src="'.$eventsPhotoLink.'"height="500" width="500"/>
									<h3>'.$eventDescription.'</h3>
							</div>
						</div>';
						while ($row = mysqli_fetch_array($result)) {
						//$row['id'] . ' ' . $eventName = $row['eventName'] . ' ' . $eventDescription = $row['eventDescription'] . ' ' . $eventCategory = $row['eventCategory'] . ' ' . $eventLink = $row['eventLink'] . ' ' . $eventPrice=  $row['eventPrice'] . ' ' . $eventDate = $row['eventDate'] .'<br />';
						$eventName = $row['eventName'];
						$eventDescription = $row['eventDescription'];
						$eventCategory = $row['eventCategory'];
						$eventLink = $row['eventLink'];
						$eventPrice = $row['eventPrice'];
						$eventDate = $row['eventDate'];
						$eventsPhotoLink = $row['eventsPhotoLink'];
						$output .= '
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div>
									<a href="'.$eventLink.'"><span>'.$eventName.'</span></a>
									<h3>From R'.$eventPrice.'</h3>
									
								</div>
									<img src="'.$eventsPhotoLink.'"height="500" width="500"/>
									<h3>'.$eventDescription.'</h3>
							</div>
						</div>';
						}
						?>
			</div>

		</div>
    	 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>

<?php
	print ("$output");
?>
