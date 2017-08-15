<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://127.0.0.1")
{
	header("Access-Control-Allow-Origin: $http_origin");
}

$user = $_GET['u'];

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'test';

$con = mysqli_connect($host, $username, $password, $db);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ticket history");
$sql="select ticket_id, ticket_name, ticket_desc, ticket_price, quantity FROM customer_ticket c NATURAL JOIN ticket WHERE username= '" . $user . "'";
$result = mysqli_query($con,$sql);

//encode query results into json object
$rows = array();
while ($r = mysqli_fetch_assoc($result)){
	$rows[] = $r;	
}
$json = json_encode($rows);
	echo $json;	


mysqli_close($con);
?>

