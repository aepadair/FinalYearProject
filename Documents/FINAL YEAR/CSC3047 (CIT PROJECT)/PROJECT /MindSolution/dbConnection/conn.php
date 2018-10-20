//Code was taken from johns module in 2nd year
// changed username details to connect to my database
<?php
//include password
include("password.php");
//declare MySQL username
$user = "csc2043g4";
//declare webserver
$webserver = "localhost";
$db = "csc2043g4";

//mysqli api library in PHP to connect to the DB
$conn = mysqli_connect($webserver, $user, $password, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}
