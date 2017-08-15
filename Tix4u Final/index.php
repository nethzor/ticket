<?php
	session_start();
	require 'dbconfig/config.php';
	$output = '';
	
	
	
	if(isset($_POST['search']))
	{
		$searchQ = $_POST['search'];
		$searchQ = preg_replace("#[^0-9a-z]#i","",$searchQ);
		
		$query = mysqli_query($con,"SELECT * FROM userinformationtable WHERE username LIKE '%$searchQ%' OR email LIKE '%$searchQ%'") or die("Search Failed");
		$count = mysqli_num_rows($query);
		
		
		if($count == 0)
		{
			$output = 'Oops, seems like there were no search results :(';
		}
		else
		{
			while($row = mysqli_fetch_array($query))
			{
				$username = $row['username'];
				$email = $row['email'];
				$id = $row['id'];
				
				
				$output .= '<div>'.$username.' '.$email.'</div>';
				
			}
		}
		
	}
?>


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>HOME</title>
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
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('body').jKit();
		});
		</script>
	
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
						<li class="active"><a href="index.php">HOME</a></li>
						<li><a href="gallery.php">GALLERY</a>
							
						</li>
						<li><a href="events.php">EVENTS</a></li>
						<li><a href="buysell.php">BUY&SELL </a></li>
						<li><a href="contact.php">CONTACT</a></li>
						<li style=""><a href="#">LOG IN</a></li>
						
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
	
    
	
	<div class="sldShow">
  	<div data-jkit="[slideshow:interval=4000;speed=250;animation=fade]">
		<a><img src="media/images/1.jpg"></a>
		<a><img src="media/images/2.jpg"></a>
		<a><img src="media/images/3.jpg"></a>
	</div>
  </div>
    
    

	
	<div class="container" style="margin-top:25px">
		<center>
			<h2 style="padding-bottom:25px">Featured Events</h2>
		</center>
		<div class="row">
		  
					<div class="col-md-4 text-center">
						<div class="eventBox">
							<div>
							    <a><span>EVENT ONE</span></a>
								<h3>From R150</h3>
								
							</div>
								<img src="media/images/5.jpg" style="width:100%">
								<h3>Event Description</h3>
						</div>
					</div>
					
					<div class="col-md-4 text-center">
						<div class="eventBox">
							<div>
							    <a><span>EVENT TWO</span></a>
								<h3>From R150</h3>
								
							</div>
								<img src="media/images/5.jpg" style="width:100%">
								<h3>Event Description</h3>
						</div>
					</div>
					
					<div class="col-md-4 text-center">
						<div class="eventBox">
							<div>
							    <a><span>EVENT THREE</span></a>
								<h3>From R150</h3>
								
							</div>
								<img src="media/images/5.jpg" style="width:100%">
								<h3>Event Description</h3>
						</div>
					</div>
		</div>
		
		<center style="padding-bottom:50px;">
			<h2 style="padding-bottom:5px;padding-top:50px">What makes us different?</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur dignissim rhoncus quam, eget suscipit ex. Maecenas laoreet, augue vitae efficitur suscipit, mi metus dignissim ipsum, quis bibendum libero tortor vitae tortor. Maecenas varius risus et viverra convallis. Phasellus eu magna vehicula, pulvinar tellus sed, placerat lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer dictum, erat et eleifend malesuada, odio felis auctor ante, a dictum mi nibh a mauris. In hac habitasse platea dictumst. Curabitur ac hendrerit sem. Integer a neque pharetra, dictum velit vel, gravida ante. In auctor tortor vel eros pretium, vel laoreet metus ullamcorper. Ut posuere odio nisi, vel elementum nunc congue eget.</p>
			<p>Praesent imperdiet orci venenatis, vehicula nulla malesuada, posuere nulla. Nullam vitae arcu quis purus pellentesque pharetra. Mauris eget libero eget dolor viverra varius quis sollicitudin massa. Quisque eu placerat lorem, in varius magna. In hac habitasse platea dictumst. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur rhoncus eros ac justo pretium, id vulputate risus congue. Sed nisl ante, consectetur at scelerisque ut, euismod vitae erat. Fusce sed nulla in eros porttitor fringilla at id dui. Morbi sed porta mi. Aliquam dictum sagittis porta. Aenean commodo massa id dolor blandit congue. Nulla fermentum nulla sit amet tincidunt bibendum. Sed aliquam nec sem a porta.</p>
		</center>
	</div>
	
	
    
  
    
 

  
  
  <?php 
		
		print("$output");
		
	?>
  

    
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
