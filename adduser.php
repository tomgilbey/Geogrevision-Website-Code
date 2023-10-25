<?php
session_start();
require_once("database.php");

//DECLARE VARIABLES

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$cusername = $_POST['cusername'];
$cpassword = $_POST['cpassword'];



//VALIDATION

if (strlen($fname)<1){
	echo 'fname';
} elseif (strlen($sname) < 1){
	echo 'sname';
} elseif (strlen($email)<4){
	echo 'emailshort';
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL)===false){
	echo 'emailformat';
} elseif (strlen($cusername)<1){
	echo 'username';
} elseif (strlen($cpassword)<8){
	echo 'passwordshort';
}else{
	//PASSWORD ENCRYPTION 

	$spassword = password_hash($cpassword, PASSWORD_BCRYPT, ['cost' => 12]);
	
	//CHECKING IF EMAIL EXISTS 
	$query = "SELECT * FROM users WHERE email='$email'"; //Constructing the SQL statement
	$result = mysqli_query($link, $query) or die(mysqli_error()); //mysqli_query is a function that takens in 2 parameters - the database connection and the query. The OR is used to return the error if one occurs - die will end the script
	$num_row = mysqli_num_rows($result); //retuens the number of results
	$row = mysqli_fetch_array($result); //returns the actual results as an array

	
	if($num_row<1){
		//CHECKING IF USERNAME EXISTS
		$query = "SELECT * FROM users WHERE username='$cusername'";
		$result = mysqli_query($link, $query) or die(mysqli_error());
		$num_row = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
		
		if($num_row<1){ //if num rows is < 1 then that means the username does not exist. We can therefore insert a new record with the inputted data.
			$insert_row = $link->query("INSERT INTO users (fname, sname, email, username, password) VALUES ('$fname','$sname','$email','$cusername','$spassword')"); //SQL statement to insert into table.
			
			if($insert_row){ //if the result is true i.e. the data has been added then unset any session id so it is clear ready to login. 				
				unset($_SESSION['login']);
				unset($_SESSION['username']);
				echo 'true';
			}
		} else{
			echo 'usernametaken';
		}
	} else{
		echo 'emailtaken';
	}
}

?>
