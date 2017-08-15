<?php 
include_once("dbconfig/config.php");
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Buy and Sell</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

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
							<li><a href="index.php">HOME</a></li>
							<li><a href="gallery.php">GALLERY</a></li>
							<li><a href="events.php">EVENTS</a></li>
							<li class="active"><a href="buysell.php">BUY&SELL </a></li>
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
				<h2 style="padding-bottom=5px">Buy from other users:</h2>
			</center>
			<div class="row">
<?php
      
						$query = "SELECT Name, event_name, num_of_tickets, ticket_price, contact_info FROM resell";
						mysqli_query($db, $query) or die('DB NOT FOUND.');

						$result = mysqli_query($db, $query);
						$row = mysqli_fetch_array($result);	
						$Name = $row['Name'];						
						$event_name = $row['event_name'];
						$num_of_tickets = $row['num_of_tickets'];
						$ticket_price = $row['ticket_price'];
						$contact_info = $row['contact_info'];
						$output = '
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div >
									<div>
									Name: '.$Name.'
									</div>
									<p> Event: '.$event_name.'</p>
									<p> Number of tickets: '.$num_of_tickets.'</p>
									<p> Ticket Price (per ticket): R'.$ticket_price.'</p>
									<p> Contact information: '.$contact_info.'</p>
								</div>
							</div>
						</div>';
						while ($row = mysqli_fetch_array($result)) {
						$Name = $row['Name'];						
						$event_name = $row['event_name'];
						$num_of_tickets = $row['num_of_tickets'];
						$ticket_price = $row['ticket_price'];
						$contact_info = $row['contact_info'];
						$output .= '
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div >
									<div>
									Name: '.$Name.'
									</div>
									<p> Event: '.$event_name.'</p>
									<p> Number of tickets: '.$num_of_tickets.'</p>
									<p> Ticket Price (per ticket): R'.$ticket_price.'</p>
									<p> Contact information: '.$contact_info.'</p>
								</div>
							</div>
						</div>';
						}
						
				
				
            ?>
	   
    </div>
		</div>
    	 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	<div class="row" >
			  
					
		
			<div>
				<h1><center><a href="Sell.php?Category=Sell"><span>Sell</span></a></center></h1>
									
			</div>
	</div>
	 <?php 
		
		print("$output");
		
	?>
</html>
