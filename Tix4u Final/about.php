<?php

		require 'dbconfig/config.php';
	$output = '';
	
	
	
	if(isset($_POST['search']))
	{
		$searchQ = $_POST['search'];
		$searchQ = preg_replace("#[^0-9a-z]#i","",$searchQ);
		
		$query = mysqli_query($con,"SELECT * FROM events WHERE eventName LIKE '%$searchQ%' OR eventDescription LIKE '%$searchQ%' OR eventCategory LIKE '%$searchQ%'") or die("Search Failed");
		$count = mysqli_num_rows($query);
		
		
		
		
		
		
		if($count == 0)
		{
			$output = 'Oops, seems like there were no search results';
		}
		else
		{
			while($row = mysqli_fetch_array($query))
			{
				$eventName = $row['eventName'];
				$eventDescription = $row['eventDescription'];
				$eventCategory = $row['eventCategory'];
				$eventLink = $row['eventLink'];
				$eventPrice = $row['eventPrice'];
				$eventDate = $row['eventDate'];
				
				
				$output .= 
				'<a href="'.$eventLink.'"><div style="border: 2px solid black;margin-top:60px;margin-left:10px;margin-right:10px;margin-bottom:10px;background-color: aliceblue;padding-left:10px;padding-right:10px;">
					<div style="color: red">
						<center><h2>'.$eventName.'</h2></center>
					</div>
					<div style="color: blue">
						<h4><strong>Price:	R'.$eventPrice.'</strong></h4>
					</div>
					<div style="color: green">
						<h5><strong>Category: '.$eventCategory.'</strong></h5>
					</div>
					<div style="color: orange">
						<h5><strong>Date: '.$eventDate.'</strong></h5>
					</div>
					<div style="color: blue;padding-bottom:10px">
						'.$eventDescription.'
					</div>
					
				
				</div></a>';
				
			}
		}
		
	}

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ABOUT</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
		
			<nav>
			  <ul>
			   <form id="searchBox">
					<input type="search" placeholder="Search">
				</form>
				<li><a href="index.php">Home</a></li>
				<li><a class="underlineActivePage" href="about.php">About</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a href="events.php">Events</a></li>
				<li><a href="buysell.php">BUY&SELL </a></li>
				<li><a href="contact.php">Contact</a></li>
				<li style=""><a href="http://10.0.0.12/test2/main.php">LOG IN</a></li>
				<li style="float:right;font-size:1.0em"><a href="#"><i class="fa fa fa-shopping-cart fa-2x"></i>(0)</a></li>
			  </ul>
			</nav>
			
			
			<div class="container" style="margin-top:50px">
				<div class="row">
				
					
					<div class="text-center">
						<h2 style="margin-top:50px;margin-bottom:50px">About Us</h2>
						<div class="border"></div>
					</div>
					
					<div class="col-md-4 text-center">
						<i class="fa  fa-smile-o fa-4x"></i>
						<div class="text-center">
							<h3>Quality service with a smile</h3>								
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nihil, libero, perspiciatis eos provident laborum eum dignissimos</p>
						</div>
					</div> 
					
					<div class="col-md-4 text-center">
						<i class="fa fa-users fa-4x"></i>
							<div class="text-center">
								<h3>Professional Student Service</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nihil, libero, perspiciatis eos provident laborum eum dignissimos</p>
							</div>
						
					</div> 
								
					<div class="col-md-4 text-center">
						<i class="fa fa-usd fa-4x"></i>
							<div class="text-center">
								<h3>Lowest Possible Price</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, nihil, libero, perspiciatis eos provident laborum eum dignissimos</p>
							</div>
					</div> 
				
			</div>
			<div class="row">
					<div class="text-center">
						<h2 style="margin-top:50px;margin-bottom:50px"><br>Statistics</h2>
						<div class="border"></div>
					</div>
				
					<div class="col-md-4 text-center">
						<div class="eventBox">
							<div>
							     <span>98%</span>
								
							</div>
							<i class="fa fa-users fa-3x"></i>
							<h3>Happy Student Clients</h3>
						</div>
					</div>
					
					<div class="col-md-4 text-center">
						<div class="eventBox">
							<div>
							    <span>20</span>
							</div>
							<i class="fa fa-check-square fa-3x"></i>
							<h3>Projects completed this year</h3>
						</div>
					</div>
				
					<div class="col-md-4 text-center">
						<div class="eventBox">
							<div>
							    <span>95%</span>
								
							</div>
							<i class="fa fa-thumbs-up fa-3x"></i>
				            <h3>Positive feedback from customers</h3>
							
						</div>
					</div>
				
					
		
					
				</div>
				
				<div class="text-center">
						<h2 style="margin-top:50px;margin-bottom:50px">Meet our team</h2>
						<div class="border"></div>
					</div>

				<div class="row">
			  <div class="col-md-2 col-md-offset-1 text-center">
				<div class="eventBox">
				   <img src="media/images/6.jpg" style="width:100%">
				  
					<h2>Jane Doe</h2>
					<p class="title">CEO &amp; Founder</p>
					<p>Some text that describes me lorem ipsum ipsum lorem.</p>
					<p>example@example.com</p>
					
				  </div>
				</div>
				<div class="col-md-2 text-center">
				<div class="eventBox">
				  <img src="media/images/2.jpg" style="width:100%">
				  
					<h2>Jane Doe</h2>
					<p class="title">CEO &amp; Founder</p>
					<p>Some text that describes me lorem ipsum ipsum lorem.</p>
					<p>example@example.com</p>
					
				  </div>
				</div>
				<div class="col-md-2 text-center">
				<div class="eventBox">
				   <img src="media/images/3.jpg" style="width:100%">
				  
					<h2>Jane Doe</h2>
					<p class="title">CEO &amp; Founder</p>
					<p>Some text that describes me lorem ipsum ipsum lorem.</p>
					<p>example@example.com</p>
					
				  </div>
				</div>
				<div class="col-md-2 text-center">
				<div class="eventBox">
				   <img src="media/images/4.jpg" style="width:100%">
				  
					<h2>Jane Doe</h2>
					<p class="title">CEO &amp; Founder</p>
					<p>Some text that describes me lorem ipsum ipsum lorem.</p>
					<p>example@example.com</p>
					
				  </div>
				</div>
				<div class="col-md-2 text-center">
				<div class="eventBox">
				   <img src="media/images/5.jpg" style="width:100%">
				  
					<h2>Jane Doe</h2>
					<p class="title">CEO &amp; Founder</p>
					<p>Some text that describes me lorem ipsum ipsum lorem.</p>
					<p>example@example.com</p>
					
				  </div>
				</div>
			  </div>
			  </div>
			</div> 
			
			
			
			


		
			
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
	</body>
	
</html>
