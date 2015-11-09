<?php
$limit = 3;
$adjacent = 3;
$con = mysqli_connect("localhost","root","","ajax_pagination");
if(mysqli_connect_errno()){
    echo "Database did not connect";
    exit();
}
?>