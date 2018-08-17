<?php
    # подключение файла с настройками для базы данных
    include 'connection.php';


    # проверка что в форме передаются какие-нибудь значения
    if (isset($_POST['submit'])) {
        # переменные получаемые из формы
        $username = $_POST['username'];
        $email = $_POST['email'];

        # запрос в БД для проверки совпадения имени пользователя
        $query_user = mysqli_query($link, "SELECT `username` FROM `users` WHERE username='".$username."'");
        $result_user = mysqli_num_rows($query_user);
        if ($result_user == null) {
            # добавление записи о пользователе в базу данных
            $insert_user = mysqli_query($link, "INSERT INTO `users` (`username`, `e-mail`) VALUES ('".$username."','".$email."')");

            include 'function/calc_ip.php';
            calc_ip($username);

        }
        else {
            echo "find user";
        }
    }
    else {
        echo "empty field";
    }

?>