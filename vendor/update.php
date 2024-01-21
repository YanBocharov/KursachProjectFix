<?php
require('../config/db.php');

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];

mysqli_query($con, "UPDATE `products` SET `name` = '$name', `price` = '$price' WHERE `products`.`id` = '$id'");

header('Location: /pages/dashboard.php');