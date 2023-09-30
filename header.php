<html>

    <head>

 

        <title>Geogrevision</title>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=0.7">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href ="includes/css.css">

    

<?php
//Checks if a session is in progress and sets a variable 'logged in' to True to be used when changes to the site need to be made based on the users sessions status.
session_start();
if(isset($_SESSION['login'])){
	$loggedin = true;
} else {
	$loggedin = false;
}
?>




    



