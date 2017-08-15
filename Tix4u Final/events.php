<?php
session_start(); //start session
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>EVENTS</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="style/style.css" rel="stylesheet" type="text/css">
		
		
		<script type="text/javascript" src="api/jkit.complete/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="api/jkit.complete/jquery.jkit.1.2.16.min.js"></script>
		
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"> </script>
		<script>
					$(document).ready(function()
						{	
					
							//Show Items in Cart
							$( ".cart-box").click(function(e) 
							{ //when user clicks on cart box
							
								e.preventDefault(); 
								$(".shopping-cart-box").fadeIn(); //display cart box
								$("#shopping-cart-results").html('<img src="media/images/ajax-loader.gif">'); //show loading image
								$("#shopping-cart-results" ).load( "cart.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
									
							});
						
							//Close Cart
							$( ".close-shopping-cart-box").click(function(e)
							{ //user click on cart box close link
								e.preventDefault(); 
								$(".shopping-cart-box").fadeOut(); //close cart-box
							});
						
							//Remove items from cart
							$("#shopping-cart-results").on('click', 'a.remove-item', function(e) 
							{
								e.preventDefault(); 
								var pcode = $(this).attr("data-code"); //get event_id
								$(this).parent().fadeOut(); //remove item element from box
								$.getJSON( "cart.php", {"remove_code":pcode} , function(data)
								{ //get Item count from Server
									$("#cart-info").html(data.items); //update Item count in cart-info
									$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
								});
							});
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
							<li><a href="buysell.php">BUY&SELL </a></li>
							<li><a href="contact.php">CONTACT</a></li>
							<li><a href="#">Log In</a></li>
							
						</ul>

						

						<form action="" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search...">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
						</form>
						
					<li style="float:right;font-size:1.0em;padding-top:10px;"><a href="#" class="cart-box" id="cart-info" title="View Cart">
					<?php 
							if(isset($_SESSION["tickets"])){
							echo count($_SESSION["tickets"]); 
							}else{
							echo 0; 
						}
						?>
						</a></li>
					</div>
					

				</div>
			</div>
				
		</header>
		<br><br><br>

        <div class="shopping-cart-box">

        <a href="#" class="close-shopping-cart-box" >Close</a>

        <h3>Your Shopping Cart</h3>

            <div id="shopping-cart-results">

            </div>

        </div>
				
		<div class="container" style="margin-top:100px">
			<center>
				<h2 style="padding-bottom=5px">Featured Events</h2>
			</center>
			<div class="row">
			  
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div>
									<a href="event.php?eventCategory=Baseball"><span>Baseball</span></a>
									<h3>From R50</h3>
									
								</div>
								
										<img src="https://i.stack.imgur.com/aFYTl.jpg?s=328&g=1"/>
									
									<h3>Morbi ac metus neque. Integer ut nisl at leo ullamcorper condimentum nec quis lectus. Morbi eu semper odio, vel blandit lacus. Phasellus ex augue, luctus nec turpis quis, auctor interdum libero. Maecenas eu dolor eu ipsum aliquam accumsan vitae in diam. Proin ut pharetra metus, laoreet interdum velit. Phasellus rhoncus leo vestibulum aliquet ultrices. Mauris semper tincidunt nunc luctus vestibulum. Aenean eu vehicula diam. Sed rhoncus porta eleifend.</h3>
							</div>
						</div>
						
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div>
									<a href="event.php?eventCategory=Festival"><span>Festival</span></a>
									<h3>From R100</h3>
									
								</div>
									<img src="https://i.stack.imgur.com/aFYTl.jpg?s=328&g=1"/>
									<h3>Morbi ac metus neque. Integer ut nisl at leo ullamcorper condimentum nec quis lectus. Morbi eu semper odio, vel blandit lacus. Phasellus ex augue, luctus nec turpis quis, auctor interdum libero. Maecenas eu dolor eu ipsum aliquam accumsan vitae in diam. Proin ut pharetra metus, laoreet interdum velit. Phasellus rhoncus leo vestibulum aliquet ultrices. Mauris semper tincidunt nunc luctus vestibulum. Aenean eu vehicula diam. Sed rhoncus porta eleifend.</h3>
							</div>
						</div>
						
						<div class="col-md-4 text-center">
							<div class="eventBox">
								<div>
									<a href="event.php?eventCategory=Theater"><span>Theater</span></a>
									<h3>From R150</h3>
									
								</div>
									<img src="https://i.stack.imgur.com/aFYTl.jpg?s=328&g=1"/>
									<h3>Morbi ac metus neque. Integer ut nisl at leo ullamcorper condimentum nec quis lectus. Morbi eu semper odio, vel blandit lacus. Phasellus ex augue, luctus nec turpis quis, auctor interdum libero. Maecenas eu dolor eu ipsum aliquam accumsan vitae in diam. Proin ut pharetra metus, laoreet interdum velit. Phasellus rhoncus leo vestibulum aliquet ultrices. Mauris semper tincidunt nunc luctus vestibulum. Aenean eu vehicula diam. Sed rhoncus porta eleifend.</h3>
							</div>
						</div>
			</div>

		</div>
    	 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>
