<?php
/*PHP Login and registration script Version 1.0, Created by Gautam, www.w3schools.in*/
require('inc/config.php');
require('inc/functions.php');

/*Check for authentication otherwise user will be redirects to main.php page.*/
if (!isset($_SESSION['UserData'])) {
    exit(header("location:main.php"));
}


require('include/header.php');
?>
<!-- container -->
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
							<li class=""><a href="contact.php">CONTACT</a></li>
							
						
							
						</ul>

						

						<form action="" class="navbar-form navbar-right" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search...">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
						</form>
						<form class="navbar-form navbar-right" action="logout.php" role="search">
							<button style='margin-right:80px;margin-top:3px;background-color:red;border-color:transparent' type="submit" class="btn btn-primary">Logout</button>
							
						</form>
						
					
					
					</div>
					

				</div>
			</div>
<!-- container -->
<div style="margin-top:80px" class="container">
<script type="text/javascript">  

function getName(){  
var number=document.getElementById("ui").innerHTML= get_user_name($con, $_SESSION['UserData']['user_id']);
alert(number);  

}
window.onload =  getName;
</script>  
<center>
<h3 id='ui'>Welcome<?php print(get_user_name($con, $_SESSION['UserData']['user_id']));?></h3>
</center>

<?php
//echo '<pre>';
//Prints the complete list of session variable as array
//	print_r(get_user_data($con, $_SESSION['UserData']['user_id']));
//prints the user email as formatted string
//print_r(get_user_email($con, $_SESSION['UserData']['user_id']));
//prints the users name as formatted string
//print_r(get_user_name($con, $_SESSION['UserData']['user_id']));

//echo '</pre>';
?>

</div>
<?php require('include/footer.php');?>