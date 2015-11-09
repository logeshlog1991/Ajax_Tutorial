<?php
require 'config/config.php';
if(isset($_POST)) {
    if (!empty($_POST)) {
        $id = $_POST['id'];
        $delete = $conn->query("select * from register WHERE id = '$id'");
        if ($delete->num_rows > 0) {
            while ($row = $delete->fetch_assoc()) {
                $data[] = $row;
            }
        }
        echo json_encode($data);
    }
}

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $addr = $_POST['addr'];
        //$insert = $conn->query("insert into register (name,email,address) values ('$name','$email','$addr')");
        /*if($insert){
            echo "data is insert into database";
        }else{
            echo "no";
        }*/
        echo $name;
}