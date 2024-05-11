<?php

//Connecting to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "lbba";

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
  die("Sorry!! Can't connect :" . mysqli_connect_error());
}
// else{
//   echo "Connection was successful<br>";
// }

?>