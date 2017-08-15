	<?php
	require 'dbconfig/config.php';
	$output = '';
	session_start();
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
				'<a href="'.$eventLink.'"><div style="border: 2px solid #5CB3FF;margin-top:60px;margin-left:10px;margin-right:10px;margin-bottom:10px;padding-left:10px;padding-right:10px;padding-bottom:20px;">
					<div style="color: white">
						<center><h2>'.$eventName.'</h2></center>
					</div>
					<div style="color: white">
						<h4><strong>Price:	R'.$eventPrice.'</strong></h4>
					</div>
					<div style="color: white">
						<h5><strong>Category: '.$eventCategory.'</strong></h5>
					</div>
					<div style="color: white">
						<h5><strong>Date: '.$eventDate.'</strong></h5>
					</div>
					<div style="color: white;padding-bottom:10px">
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
		<title>Search</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body style=background-color:#333>
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
							<li><a href="gallery.php">GALLERY</a></li>
							<li><a href="events.php">EVENTS</a></li>
							<li><a href="contact.php">CONTACT</a></li>
						    
							
						</ul>

						

						<form action="searchResults.php" class="navbar-form navbar-right" role="search" id="searchBox" method="post">
						<div class="form-group">
							<input id="searchBoxInput" name="search" type="text" class="form-control" onkeydown="key_down()" placeholder="Search..." autocomplete="off">
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


 
	<?php 
		
		print("$output");
		
	?>
  

    
