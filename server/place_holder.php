<?php

include("connectiion.php");
if(isset($_POST['place_order'])){

    $name=$_POST['name'];
    $emaii=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $order_cost=$_SESSION['total'];
    $order_status="on_hold";
    $name=$_POST['name'];
    $user_id=1;
    $order_date=date('y-m-d H:i:s');

    $conn->prepare("INSERT into orders(order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
               values(); ")


}



?>