<?php
session_start();
$x=$_POST['body'];
$servername="localhost";
$username="root";
$password= " ";
$dbname="questions";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error){
  die("Connection failed:  " . $conn->connect_error);
}
echo "Connection successful";
$sql ="INSERT INTO 'question' ('question') VALUES ('$x')";

if ($conn->query($sql) ==TRUE)  {
echo "New record  created successful";
} else  {
echo "Error:". $sql. "<br>" . $conn->error;
}
$conn->close();
?>