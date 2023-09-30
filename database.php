<?php
define("DB_SERVER", "localhost");
define("DB_USERNAME", "tomg_admin");
define("DB_PASSWORD", "SammyAmeobiFan69");
define("DB_NAME", "tomg_geogrevision");

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die(mysqli_connect_error());
}
?>