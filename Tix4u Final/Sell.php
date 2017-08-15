<?php 
include_once("dbconfig/config.php");
session_start();
?>
<!doctype html>
<?php
	
	$user = $_SESSION['UserData'];
  $query = "SELECT events.eventName, events.eventPrice, userinformationtable.username, userinformationtable.email
FROM events INNER JOIN (userinformationtable INNER JOIN resell ON userinformationtable.[ID] = resell.[user_id]) ON events.[ID] = resell.[event_id]";

						mysqli_query($db, $query) or die('DB NOT FOUND.');

						$result = mysqli_query($db, $query);
						$row = mysqli_fetch_array($result);	
						$userame = $row['username'];						
						$event_name = $row['eventName'];
						$ticket_price = $row['eventPrice'];
						$email = $row['email'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sell</title>
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
			<a href="Sell.php"><span>Sell</span></a>
		<div class="container" style="margin-top:100px">
			<center>
				<h2 style="padding-bottom=5px">Sell your tickets:</h2>
			</center>
			<div class="row">
			
			<form class="form-group" action = "BuySell.php" method="post">
				
				<label for="evnt">Event name:</label>
				<input type="text" name="ev" value=" " class="form-control" id="evt" >
				<label for="evnt">Number of tickets:</label>
				<input type="text" name="num" value=" " class="form-control" id="num" >
				<label for="evnt">Ticket price:</label>
				<input type="text" name="prc" value="300" class="form-control" id="prc" disabled>
				<input type="submit" name="mySub" value="Submit">
			</form>
			
			
			<?php  
			if(isset($_POST["mySub"]))
			{
				$event_name = $_POST['ev'];
				$ticket_num = $_POST['num'];
				$ticket_price = $_POST['prc'] * $ticket_num;
			
			$query = "INSERT INTO resell(username event_name, num_of_tickets, ticket_price) VALUES('" . $username . "',	 '" . $event_name . "' , ". $ticket_num .", ".$ticket_price .")";
					
			mysqli_query($db, $query) or die('DB NOT FOUND.');
			}
			?>
			
							

    </div>
		</div>
		


		
    	 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>