<?php
    $con= mysqli_connect('localhost','root','','test');
    if(!$con){
        echo 'Error while connecting..'.mysqli_error();
        exit;
    }
    $cid= $_POST['cid'];
    $sql="select * from cities where cid={$cid}";
    $result= mysqli_query($con,$sql) or die('Unable to connect'.mysqli_error($con));
    while($row = mysqli_fetch_array($result)){
        $res[]=$row;
    }
    echo json_encode($res);
    mysqli_close($con);
?>

logeshlog1991@gmail.com
