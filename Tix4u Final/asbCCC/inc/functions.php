<?php
/*Function to get users data*/
function get_user_data($con, $user_id){
$result = mysqli_query($con, "SELECT U.*, P.name FROM tbl_users U LEFT JOIN tbl_user_profile P ON U.user_ID=P.user_id WHERE U.user_id='$user_id' LIMIT 1");
    if(mysqli_num_rows($result)==1){
        return mysqli_fetch_assoc($result);	
		}else{
    	return FALSE;
    }
}

//prints the users email as string
function get_user_email($con, $user_id){
$result = mysqli_query($con, "SELECT  email FROM tbl_users WHERE user_id='$user_id'");
    if(mysqli_num_rows($result)==1){
        //return mysqli_fetch_assoc($result);
		while($row = $result->fetch_assoc()) {
        echo "<br> Email:". $row["email"]."<br>";
    }
    }else{
    	return FALSE;
    }
}
//prints the users name as string
function get_user_name($con, $user_id){
$result = mysqli_query($con, "SELECT  name FROM tbl_user_profile WHERE user_id='$user_id'");
    if(mysqli_num_rows($result)==1){
        //return mysqli_fetch_assoc($result);
		while($row = $result->fetch_assoc()) {
        echo "<br>". $row["name"]."";
    }
    }else{
    	return FALSE;
    }
}

function inputCheck($con, $data) {
  return htmlspecialchars(mysqli_real_escape_string($con, trim($data)));
}

/*Function to set JSON output*/
function message($Return=array()){
    /*Set response header*/
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    /*Final JSON response*/
    exit(json_encode($Return));
}

?>
