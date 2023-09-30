<?php
session_start();
require_once("includes/database.php");

//DECLARE VARIABLES
$username = $_POST['username'];
$password = $_POST['password'];

//VALIDATION
//Check that the length of th eusername is not less than 1
if (strlen($username)<1){
	echo 'nouser'; //if it is then returns an error value 
	
//Checks that the password entered is not more than 1
} elseif (strlen($password)<1){
	echo 'nopass'; //if it is then returns an error value
	
//You could also check for a max number if you wanted to prevent SQL injection

}else{
	//PASSWORD ENCRYPTION - You'll want to do a little research on this to talk about it fluently in your write up
	$spassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
	
	//CHECKING IF USERNAME EXISTS
	$query = "SELECT * FROM users WHERE uname='$username'"; //Constructing the SQL statement
	$result = mysqli_query($link, $query) or die(mysqli_error()); //mysqli_query is a function that takens in 2 parameters - the database connection and the query. The OR is used to return the error if one occurs - die will end the script
	$num_row = mysqli_num_rows($result); //retuens the number of results
	$row = mysqli_fetch_array($result); //returns the actual results as an array
	
	if($num_row>=1){ //if num rows is >= 1 then that means a match has occured
		//CHECKING IF PASSWORD MATCHES
		if (password_verify($password, $row['password'])){ //if passwords match create a new session storing usename.
			$_SESSION['login'] = $link->insert_id;
			$_SESSION['username'] = $username;
			echo 'true';
		} else {
			echo 'passfail';
		}
	} else {
		echo 'userfail';
	}
}
?>