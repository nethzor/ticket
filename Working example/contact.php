<?php
header('Content-Type: text/html');
//for live site, this $username must be set to the session username
$username = 'dylanheunis';
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

div.left {
	position: relative;
    width: 100%;
	font-size: 32px;
	
	
}

div.container {
	background-color #20aee6;
    width: 40%;
}

body{
	background-color: #1297ec;
}
#submit{
	width: 10em;
	height: 2em;
	color: black;
	background-color: white;
	border: solid grey;
	margin:10%;
}

#textbox{
	width: 15em;
	height: 3em;
}
div.leftdiv{
    position:relative;
    float:left;
}
div.rightdiv{
    float:right;
}
.wrapper{
    width: 500px;
}

</style>
<script>
function showHistory(str) {
    if (str == "") {
        document.getElementById("history").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        document.getElementById("history").innerHTML = "";
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
        //capture and parse the incoming data
		var input = this.responseText;
		var jsonObj = JSON.parse(input);


        //loop through each element in the JSON array and output its contents
        for (var i = 0; i < jsonObj.length; i++){
         document.getElementById("history").innerHTML += '<?php echo '<div>';?>' + 'R' +jsonObj[i].ticket_price + '</br>' + jsonObj[i].ticket_name + ' Quantity - ' + jsonObj[i].quantity  + '</br>' + jsonObj[i].ticket_desc + '</div></br>';

            }
                
            }
        };
        //open connection and send request
        xmlhttp.open("GET","http://192.168.0.43/ticket/showHistory.php?u="+str,true);
        xmlhttp.send();
    }
}

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
</title>

<body>
<div>
<input type="button" id="search" value="Show History" 
onclick="showHistory('<?php echo $username ?>');">
</div>
<div id="history" class="wrapper">
</div>
<div class="container">
<div class="left">
<p>Have an enquiry?<p>
<p>Fill out this form and we'll get back to you</p>
<p id="response"></p>
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
