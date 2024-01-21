<?php
$con = mysqli_connect("localhost:8889", "root", "123456azz", "LoginSystem");
if (mysqli_connect_errno()) {
    echo "Ошибка подключения к базе данных : " . mysqli_connect_error();
}
;
