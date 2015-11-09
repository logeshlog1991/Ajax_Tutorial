<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/5/2015
 * Time: 10:11 AM
 */
require 'config/config.php';
if(isset($_POST))
{
    if(!empty($_POST)){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $addr = $_POST['addr'];
            $insert = $conn->query("insert into register (name,email,address) values ('$name','$email','$addr')");
            if($insert){
                echo "data is insert into database";
            }else{
                echo "no";
            }
    }
}
