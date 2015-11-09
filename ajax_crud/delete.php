<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/5/2015
 * Time: 1:00 PM
 */
require 'config/config.php';
if(isset($_POST)){
    if(!empty($_POST)){
        $id = $_POST['id'];
        $delete = $conn->query("delete from register where id = '$id'");

        if($delete){
            echo "data is deleted";
        }
    }
}