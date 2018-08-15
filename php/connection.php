<?php
    # переменные для определения параметров подключения к БД
    $host = '';
    $database = '';
    $user = '';
    $password = '';

    # подключение к серверу mysql
    $link = mysqli_connect($host, $user, $password, $database) or die ("Error" . mysqli_error($link));

    # решение проблемы с кодировкой
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    mysqli_query($link, "set character_set_client='utf8'");
    mysqli_query($link, "set character_set_results='utf8'");
    mysqli_query($link, "set collation_connection='utf8_general_ci'");
    mysqli_query($link, "set names utf8");
?>
