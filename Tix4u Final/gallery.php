<?php
session_start(); //start session
include("dbconfig/config.php");
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
		<link href="style/style.css" rel="stylesheet" type="text/css">
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
	 <script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
		<head>
		<meta charset="utf-8">
		<title>HOME</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
							<li><a href="index.php">HOME</a></li>
							<li class="active"><a href="gallery.php">GALLERY</a></li>
							<li><a href="events.php">EVENTS</a></li>
							<li><a href="contact.php">CONTACT</a></li>
							<li style="float:right;"><a href="#">Log In</a></li>
							
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
		
		<div class="container">
				<center style="margin-top:70px"><h3>BASEBALL EVENT</h3></center>
		
		
				<div class="row">
			  
						<div class="col-md-4 text-center">
							<div class="eventGal">
								<div>
									<a class="example-image-link" href="media/images/bb/bb1.jpg" data-lightbox="baseball-set" data-title="Baseball event image 1"><img class="example-image" src="media/images/bb/bb1.jpg" style="width:100%"></a>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-4 text-center">
							<div class="eventGal">
								<div>
									<a class="example-image-link" href="media/images/bb/bb2.jpg" data-lightbox="baseball-set" data-title="Baseball event image 2"><img class="example-image" src="media/images/bb/bb2.jpg" style="width:100%"></a>
									
								</div>
									
							</div>
						</div>
						
						<div class="col-md-4 text-center">
							<div class="eventGal">
								<div>
									<div>
									<a class="example-image-link" href="media/images/bb/bb3.jpg" data-lightbox="baseball-set" data-title="Baseball event image 3"><img class="example-image" src="media/images/bb/bb3.jpg" style="width:100%"></a>
									
								</div>
								</div>
							</div>
						</div>
						
						
				</div>
			
				<div class="row">
			  
						<div class="col-md-4 text-center">
							<div class="eventGal">
								<div>
									<a class="example-image-link" href="media/images/bb/bb4.jpg" data-lightbox="baseball-set" data-title="Baseball event image 4"><img class="example-image" src="media/images/bb/bb4.jpg" style="width:100%"></a>
								</div>
								
							</div>
						</div>
						
						<div class="col-md-4 text-center">
							<div class="eventGal">
								<div>
									<a class="example-image-link" href="media/images/bb/bb5.jpg" data-lightbox="baseball-set" data-title="Baseball event image 5"><img class="example-image" src="media/images/bb/bb5.jpg" style="width:100%"></a>
									
								</div>
									
							</div>
						</div>
						
						<div class="col-md-4 text-center">
							<div class="eventGal">
								<div>
									<div>
									<a class="example-image-link" href="media/images/bb/bb6.jpg" data-lightbox="baseball-set" data-title="Baseball event image 6"><img class="example-image" src="media/images/bb/bb6.jpg" style="width:100%"></a>
									
								</div>
								</div>
							</div>
						</div>	
				</div>
			
			<center><h3>FESTIVAL EVENT</h3></center>
			
			<div class="row">
			  
				<div class="col-md-4 text-center">
				
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/festival/1.jpeg" data-lightbox="festival-set" data-title="Festival event image 1"><img class="example-image" src="media/images/festival/1.jpeg" style="width:100%"></a>
							
						</div>
						
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/festival/2.jpg" data-lightbox="festival-set" data-title="Festival event image 2"><img class="example-image" src="media/images/festival/2.jpg" style="width:100%"></a>
							
						</div>
							
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<div>
							<a class="example-image-link" href="media/images/festival/3.jpeg" data-lightbox="festival-set" data-title="Festival event image 3"><img class="example-image" src="media/images/festival/3.jpeg" style="width:100%"></a>
							
						</div>
						</div>
					</div>
				</div>
						
						
			</div>
			
			<div class="row">
			  
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/festival/4.jpg" data-lightbox="festival-set" data-title="Festival event image 4"><img class="example-image" src="media/images/festival/4.jpg" style="width:100%"></a>
						</div>
						
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/festival/5.jpeg" data-lightbox="festival-set" data-title="Festival event image 5"><img class="example-image" src="media/images/festival/5.jpeg" style="width:100%"></a>
							
						</div>
							
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<div>
							<a class="example-image-link" href="media/images/festival/6.jpg" data-lightbox="festival-set" data-title="Festival event image 6"><img class="example-image" src="media/images/festival/6.jpg" style="width:100%"></a>
							
						</div>
						</div>
					</div>
				</div>
						
						
			</div>
			
			
			<center><h3>THEATER EVENT</h3></center>
			
			<div class="row">
			  
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/theater/1.jpg" data-lightbox="theater-set" data-title="Theater event image 1"><img class="example-image" src="media/images/theater/1.jpg" style="width:100%"></a>
						</div>
						
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/theater/2.jpg" data-lightbox="theater-set" data-title="Theater event image 2"><img class="example-image" src="media/images/theater/2.jpg" style="width:100%"></a>
							
						</div>
							
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<div>
							<a class="example-image-link" href="media/images/theater/3.jpg" data-lightbox="theater-set" data-title="Theater event image 3"><img class="example-image" src="media/images/theater/3.jpg" style="width:100%"></a>
							
						</div>
						</div>
					</div>
				</div>	
			</div>
			
			<div class="row">
			  
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/theater/4.jpg" data-lightbox="theater-set" data-title="Theater event image 4"><img class="example-image" src="media/images/theater/4.jpg" style="width:100%"></a>
						</div>
						
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<a class="example-image-link" href="media/images/theater/5.jpg" data-lightbox="theater-set" data-title="Theater event image 5"><img class="example-image" src="media/images/theater/5.jpg" style="width:100%"></a>
							
						</div>
							
					</div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="eventGal">
						<div>
							<div>
							<a class="example-image-link" href="media/images/theater/6.jpg" data-lightbox="theater-set" data-title="Theater event image 6"><img class="example-image" src="media/images/theater/6.jpg" style="width:100%"></a>
							
						</div>
						</div>
					</div>
				</div>		
			</div>
		</div>	

	

  
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>
