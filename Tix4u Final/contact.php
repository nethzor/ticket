<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CONTACT US</title>
		<link rel="stylesheet" type="text/css" href="css/homeStyle.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<script type="text/javascript">
		
		$(document).ready(function(){
			$('body').jKit();
		});
		
		function submitQuery(){
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				alert(this.responseText);
				}
			};
			var name = document.getElementsByName("name")[0].value;
			var email = document.getElementsByName("email")[0].value;
			var message = document.getElementsByName("message")[0].value;
			xhttp.open("GET", "http://192.168.0.43/ticket/query.php?name=" + name + "&email=" + email + "&message=" + message, true);
			xhttp.send();
		}
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
							<li><a href="events.php">EVENTS</a></li>
							<li><a href="buysell.php">BUY&SELL </a></li>
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
		 
		 <div class="container" style="margin-top:100px">
		  <div class="row">
			<form method="post">
				<p>Name: <input id="name" name="name" type="text"></p>
				<p>Email: <input id="email" name="email" type="text"></p>
				<p>Your message<p><textarea id="message" name="message" cols="100" rows="25"></textarea>
				</br><input type="submit" id="submit" value="Submit Query" onclick="submitQuery()" >
			</form>
		</div>
			</div>
	</body>
	
</html>
