<?php

	session_start(); //start session
	include_once("dbconfig/config.php"); //include config file
	setlocale(LC_MONETARY,"en_US"); // US national format 
	############# add items to session #########################
	
	if(isset($_POST["event_id"]))
	{
		
		
		foreach($_POST as $key => $value){
			$new_ticket[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new item array 
		}
		
		//we need to get event name and ticket price from database.
		$statement = $con->prepare("SELECT event_id,eventName, eventPrice FROM events WHERE event_id=? LIMIT 1");
		$statement->bind_param('s', $new_ticket['event_id']);
		$statement->execute();
		$statement->bind_result($event_id, $event_name,$ticket_price);
	
		while($statement->fetch()){ 
			$new_ticket["event_id"] = $event_id; //fetch event id from database
			$new_ticket["eventPrice"] = $ticket_price;  //fetch ticket price from database
			$new_ticket["eventName"] = $event_name; //fetch event name from database
			
			
			if(isset($_SESSION["UserData"])){  //if session var already exist
			
				if(isset($_SESSION["UserData"][$new_ticket['event_id']])) //check item exist in item array
				{
					unset($_SESSION["UserData"][$new_ticket['event_id']]); //unset old item
				}			
			}
			
			$_SESSION["UserData"][$new_ticket['event_id']] = $new_ticket;	//update items with new item array	
		}
		
		$total_items = count($_SESSION["UserData"]); //count total items
	
		die(json_encode(array('items'=>$total_items))); //output json 

	}

	################## list products in cart ###################
	if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
	{
		if(isset($_SESSION["UserData"]) && count($_SESSION["UserData"])>0){ //if  session variable exists
			$cart_box = '<ul class="cart-tickets-loaded">';
			$total = 0;
			foreach($_SESSION["UserData"] as $ticket){ //loop though items and prepare html content
				
				//set variables to use them in HTML content below
				//connect to db and select seat.
				
				//$ticket_code = $ticket["ticket_code"]; //ticket serial number
				$ticket_price = $ticket["eventPrice"];
				$eventName = $ticket["eventName"];
				$ticket_qty = $ticket["Ticket_qty"];
				$event_id = $ticket["event_id"];
				//$seat_num = $ticket["seat_num"];
				
				$cart_box .=  "<li> $eventName (Qty : $ticket_qty ) &mdash; $currency ".sprintf("%01.2f", ($ticket_price * $ticket_qty)). " <a href=\"#\" class=\"remove-item\" data-code=\"$event_id\">&times;</a></li>";
				$subtotal = ($ticket_price * $ticket_qty);
				$total = ($total + $subtotal);
			}
			$cart_box .= "</ul>";
			$cart_box .= '<div class="cart-tickets-total">Total : '.$currency.sprintf("%01.2f",$total).' <u><a href="cart_load.php" title="Review Cart and Check-Out">Check-out</a></u></div>';
			die($cart_box); //exit and output content
		}else{
			die("Your cart is empty"); //empty cart
		}
	}

	################# remove item from shopping cart ################
	if(isset($_GET["remove_code"]) && isset($_SESSION["UserData"]))
	{
		$event_id   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the event id to remove

		if(isset($_SESSION["UserData"][$event_id]))
		{
			unset($_SESSION["UserData"][$event_id]);
		}
		
		$total_items = count($_SESSION["UserData"]);
		die(json_encode(array('items'=>$total_items)));
	}
?>
