<?php
include("connection.php");

$stmt=$conn->prepare("SELECT * FROM products LIMIT 4");
 $stmt->execute();


$featuredProducts=$stmt->get_result();
















?>