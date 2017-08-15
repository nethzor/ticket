<?php
	session_start();
	require 'dbconfig/config.php';
	$output = '';
<<<<<<< HEAD
=======
	
	if (isset($_SESSION['UserData'])) 
	{	/*XXXXXXAAAANNNNDRRREEEEEEEEEE
		CHANGE to !isSet and edit header location*/
		//exit(header("location:index.php"));
		$action = "../asb/logout.php"; 
	}
	else
	{
		$action = "../asb/main.php"; 
	}
>>>>>>> develop
	
	if (isset($_SESSION['UserData'])) 
	{	/*XXXXXXAAAANNNNDRRREEEEEEEEEE
		CHANGE to !isSet and edit header location*/
		//exit(header("location:index.php"));
		$action = "../asb/logout.php"; 
	}
	else
	{
		$action = "../asb/main.php"; 
	}
	
	
	
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
		<title>GALLERY</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		
		<script type="text/javascript" src="api/jkit.complete/jquery-1.9.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">
		
		
		

		<script type="text/javascript">
		$(document).ready(function(){
			$('body').jKit();
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
						<a style="float:left"href="index.php" class="navbar-brand">Tix4u</a>
					</div>
					<div class="collpase navbar-collapse" id="example">
						<ul class="nav navbar-nav">
							<li><a href="index.php">HOME</a></li>
							<li class="active"><a href="gallery.php">GALLERY</a></li>
							<li><a href="events.php">EVENTS</a></li>
							<li><a href="contact.php">CONTACT</a></li>
							
							
						</ul>

						

						<form action="searchResults.php" class="navbar-form navbar-right" role="search" id="searchBox" method="post">
						<div class="form-group">
							<input id="searchBoxInput" name="search" type="text" class="form-control" onkeydown="key_down()" placeholder="Search..." autocomplete="off">
<<<<<<< HEAD
							<script>
							  function key_down(e) 
							  {
								if(e.keyCode === 13)
								{
								  search_func();
								}
							  }

							  function search_func() 
							  {
								var address = document.getElementById("searchBoxInput").value;
								initialize();
							  }
							</script>
=======
							<!--WESSEL!-->
>>>>>>> develop
						</div>
						<button type="submit" class="btn btn-primary">Search</button>
					</form>
					<form class="navbar-form navbar-right" action="<?php echo $action; ?>" role="search">
							<button style='margin-right:80px;margin-top:3px;background-color:red;border-color:transparent' type="submit" class="btn btn-primary">
								<?php 
									if (isset($_SESSION['UserData'])) 
									{	/*XXXXXXAAAANNNNDRRREEEEEEEEEE
										CHANGE to !isSet */
										echo 'LOG OUT';
									}
									else
									{
										echo 'LOG IN';
									}
								?>
							</button>
							
						</form>
					
				<li style="font-size:1.0em;padding-top:10px"><a href="#"><i class="fa fa fa-shopping-cart fa-2x"></i>(0)</a></li>
				</div>
						
				
					

				</div>
			</div>
				
		</header>
		
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

			<!--DIE CHAT SE LINK-->
	<!--https://salesiq.zoho.com/-->	
	<script type="text/javascript">
	var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || 
	{widgetcode:"7326515b74ea374c61d3ec46aa879f9d39ec90e79be88a4b11ad7ea2f28f1c40", values:{},ready:function(){}};
	var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
	s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
	</script>
	<!--End van chat se link-->

  
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
	
</html>
