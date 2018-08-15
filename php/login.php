<?php
    # подключение файла с настройками для базы данных
    include 'connection.php';

    # проверка авторизации
    if(!empty($_POST["username"] && !empty($_POST["password"]))) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        # запрос к базе для получения логина и пароля
        $query = mysqli_query($link,"SELECT * FROM `admins` WHERE username='".$username."' AND password='".$password."'");
        $login = mysqli_fetch_assoc($query);

        # проверка что результат из базы не пустой
        if(!empty($login)) {
            # старт сессии
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $login['username'];
            header("Location: ../home.php");
        }
        else {
            echo "invalid username and/or password";
        }
    }