<?php
session_start(); //start session
include("dbconfig/config.php");
setlocale(LC_MONETARY,"en_US"); // US national format
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Review Your Cart Before Booking</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="style/style.css" rel="stylesheet" type="text/css">
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
							<li style="float:right;"><a href="#">Log In</a></li>
							
						</ul>

						

						<form action="" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search...">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
						</form>
						
						
					</div>
				</div>
			</div>
				
			</header>
			<br>
			<br>
			<br>
		<h3 style="text-align:center">Review Your Cart Before Booking</h3>
		<?php
			
			if(isset($_SESSION["UserData"]) && count($_SESSION["UserData"])>0)
			{
				$total 			= 0;
				$list_tax 		= '';
				$cart_box 		= '<ul class="view-cart">';

				foreach($_SESSION["UserData"] as $ticket)
				{ //Print each eventName, quantity and price.
		
					$ticket_qty = $ticket["Ticket_qty"];
					$tickets_price = $ticket["eventPrice"];
					$eventName = $ticket["eventName"];
					//$tickets_code = $ticket["tickets_code"];
					//$seat_num = $ticket["seat_num"];
					
					$item_price 	= sprintf("%01.2f",($tickets_price * $ticket_qty));  // price x qty = total event cost
					
					$cart_box 		.=  "<li> $eventName &ndash; (Qty : $ticket_qty ) <span> $currency $item_price </span></li>";
					
					$subtotal 		= ($tickets_price * $ticket_qty); //Multiply item quantity * price
					$total 			= ($total + $subtotal); //Add up to total price
														
				}
	
				$grand_total = $total ; //grand total
				
				foreach($taxes as $key => $value)
				{ //list and calculate all taxes in array
						$tax_amount 	= round($total * ($value / 100));
						$tax_item[$key] = $tax_amount;
						$grand_total 	= $grand_total + $tax_amount; 
				}
				
				foreach($tax_item as $key => $value)
				{ //taxes List
					$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
				}
				
				
				
				//Print  Total
				$cart_box .= "<li class=\"view-cart-total\"> $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
				$cart_box .= "</ul>";
				
				$cart_box .= ".<center><input type=\"button\" value=\"Proceed\" class=\"homebutton\" id=\"btnHome\" 
				onClick=\"document.location.href='cart_proc.php'\" /></center>";
			
				
				echo $cart_box;
				
			}
			else
			{
				echo "Your Cart is empty";
			}
			//display button proceed
			//check through db to find seats.
			
			//display EFT details and reference number.
		?>
	</body>
</html>