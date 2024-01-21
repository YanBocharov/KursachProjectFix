<?php

require('../config/db.php');

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM `products` WHERE `products`.`id` = '$id'");

header('Location: /pages/dashboard.php');