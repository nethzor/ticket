<?php
session_start(); //start session
include("dbconfig/config.php"); //include config file
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Event</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="style/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"> </script>
		<script>
			$(document).ready(function()
			{
				
				$(".form-item").submit(function(e)
				{
					var form_data = $(this).serialize();
					var button_content = $(this).find('button[type=submit]');
					button_content.html('Adding...'); //Loading button text 

					$.ajax({ //make ajax request to cart.php
					
						url: "cart.php",
						type: "POST",
						dataType:"json", //expect json value from server
						data: form_data
						
					}).done(function(data)
					{ //on Ajax success
						$("#cart-info").html(data.items); //total items in cart-info element
						button_content.html('Add to Cart'); //reset button text to original text
						alert("Item added to Cart!"); //alert user
						if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
							$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
							
						}
						
					}).fail(function(data) {
						console.log("There was an error: " + JSON.stringify(data));
						$("#cart-info").html(data.items);
						alert("Sorry. Server unavailable. "); 
					});
					
					e.preventDefault();
				});

				
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
	 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>	
		<div align="center">
		<?php 
			if(isset($_GET['eventCategory']))
			{
				$_SESSION['eventCategory'] = $_GET['eventCategory'];
				
			} 
			
		?>
		<h3><?php echo $_SESSION['eventCategory']; ?></h3>
	</div>



<div class="shopping-cart-box">
<a href="#" class="close-shopping-cart-box" >Close</a>
<h3>Your Shopping Cart</h3>
    <div id="shopping-cart-results">
    </div>
</div> //in all

<?php
//List events from database
$sql = "SELECT event_id, eventName, eventDescription, eventCategory, eventLink, eventPrice, eventDate FROM events WHERE eventCategory= '" .$_SESSION['eventCategory']."';";

$results = $con->query($sql);

//Display fetched records

$event_list =  '<ul class="events-wrp">';

while($row = $results->fetch_assoc()) {
$event_list .= <<<EOT
<li>
<form class="form-item">
<h4>{$row["eventName"]}</h4>
<p> Description:  {$row["eventDescription"]}</p>
<p> Date:  {$row["eventDate"]}</p>
<div>Price : {$currency} {$row["eventPrice"]}<div>
<div class="item-box">
    
	
	<div>
    Qty :
    <select name="Ticket_qty">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
	<option value="6">6</option>
    </select>
	</div>
	
	
	
    <input name="event_id" type="hidden" value="{$row["event_id"]}">
	<button type="submit">Book tickets</button>
	
</div>
</form>
</li>
EOT;

}
$event_list .= '</ul></div>';

echo $event_list;
?>
</body>
</html>
	
