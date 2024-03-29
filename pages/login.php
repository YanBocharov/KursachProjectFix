<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Вход</title>
    <link rel="stylesheet" href="../styles/css/style.min.css" />
</head>

<body>
    <?php
    require('../config/db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Неправильное имя пользователя или пароль.</h3><br/>
                  <p class='link'>Нажмите здесь чтобы <a href='login.php'>Войти</a> опять.</p>
                  </div>";
        }
    } else {
        ?>
        <form class="form" method="post" name="login">
            <h1 class="login-title">Войти</h1>
            <input required type="text" class="login-input" name="username" placeholder="Имя пользователя"
                autofocus="true" />
            <input required type="password" class="login-input" name="password" placeholder="Пароль" />
            <input type="submit" value="Войти" name="submit" class="login-button" />
            <p class="link"><a href="registration.php">Зарегистрировать нового пользователя</a></p>
        </form>
        <?php
    }
    ?>
</body>

</html>