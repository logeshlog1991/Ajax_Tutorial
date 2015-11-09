<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ajax';

$conn = new mysqli($host,$user,$pass,$db);
if($conn->error){
    echo $conn->error;
}
?>