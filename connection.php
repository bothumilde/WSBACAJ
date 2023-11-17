<?php
function connection(){
    $servername = "localhost";
    $database = "bacaj";
    $username = "root";
    $password = "";
    // Create connection
$conn = mysqli_connect('localhost', 'root','','bacaj');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
return $conn;
};
?>