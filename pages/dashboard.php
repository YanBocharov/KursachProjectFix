<?php
require('../config/db.php');
include("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Клиентская страница</title>
    <link rel="stylesheet" href="../styles/css/style.min.css" />
    <link rel="stylesheet" href="../styles/css/dashboard.min.css" />
</head>

<style>
    th,
    td {
        padding: 10px;
    }

    th {
        background-color: #606060;
    }

    td {
        background-color: black;
    }
</style>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
        <?php
        $products = mysqli_query($con, query: 'SELECT * FROM `products`');
        $products = mysqli_fetch_all($products);
        foreach ($products as $product) {
            ?>
            <tr>
                <td>
                    <?= $product[0] ?>
                </td>
                <td>
                    <?= $product[1] ?>
                </td>
                <td>
                    <?= $product[2] ?>
                </td>
                <td>
                    <a href="../pages/update.php?id=<?= $product[0] ?>">Изменить</a>
                    <a style="color: red" href="../vendor/delete.php?id=<?= $product[0] ?>">Удалить</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <form action="../vendor/create.php" method='post'>
        <p>Имя</p>
        <input placeholder="Введите название продукта" type="text" name='name'>
        <p>Стоимость</p>
        <input placeholder="Введите цену продукта" type='number' name="price"></input>
        <br><br>
        <button type="submit">Добавить новый продукт</button>
    </form>

    <br><br>
    <a href="../pages/logout.php" class="behindBtn">Выйти</a>
</body>

</html>