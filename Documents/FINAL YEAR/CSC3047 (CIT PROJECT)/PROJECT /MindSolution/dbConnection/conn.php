//Code was taken from johns module in 2nd year
// changed username details to connect to my database
<?php
//include password
include("password.php");
//declare MySQL username
$user = "aadair11";
//declare webserver
$webserver = "localhost";
$db = "aadair11";

//mysqli api library in PHP to connect to the DB
$conn = mysqli_connect($webserver, $user, $password, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error() );
}
