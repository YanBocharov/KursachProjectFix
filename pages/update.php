<?php
require('../config/db.php');

$product_id = $_GET['id'];
$product = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение информации</title>
</head>

<body>
    <h3>Изменить данные</h3>
    <form action="../vendor/update.php" method='post'>
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>Имя</p>
        <input type="text" name='name' value="<?= $product['name'] ?>">
        <p>Стоимость</p>
        <input type='number' name="price" value="<?= $product['price'] ?>"></input>
        <br><br>
        <button type="submit">Изменить данные</button>
    </form>
</body>

</html>