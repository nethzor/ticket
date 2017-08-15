<!doctype html>
<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>CONTACT US</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
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
							<li><a href="events.php">EVENTS</a></li>
							<li class="active"><a href="contact.php">CONTACT</a></li>
							<li style="float:right;"><a href="#">Log In</a></li>
							
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
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>
