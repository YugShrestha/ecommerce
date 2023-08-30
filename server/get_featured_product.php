<?php
include("connection.php");

$stmt=$conn->prepare("SELECT * FROM products limit 4 ");
 $stmt->execute();


$featuredProducts=$stmt->get_result();
















?>