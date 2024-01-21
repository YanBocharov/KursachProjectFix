<?php
require('../config/db.php');

$name = $_POST['name'];
$price = $_POST['price'];

mysqli_query($con, query: "INSERT INTO `products` (`id`, `name`, `price`) VALUES (NULL, '$name', '$price')");

header('Location: /pages/dashboard.php');