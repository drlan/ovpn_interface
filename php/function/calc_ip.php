<?php

# функция для расчета ip-адреса
    function calc_ip($username) {

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

        # объявление переменной с адресом сети
        $network = '192.168.222.';

        # объявление начального значения счетчика
        $i = 2;

        # максимальное значение для счетчика
        $limit = 65;

        # цикл для расчета ip-адреса
        while ($i < $limit) {
            # расчет последней части адреса
            $host_ip = ($i * 4) - 2;

            # расчет последней части адреса для шлюза
            $gw_ip = ($i * 4) - 3;

            # ip адрес нового пользователя
            $ip = $network . (string)$host_ip;

            # ip адрес для шлюза
            $ip_gw = $network . (string)$gw_ip;

            # поиск совпадающих ip-адресов в базе данных
            $query_ip = mysqli_query($link, "SELECT `ip` FROM `users` AS ip WHERE `ip`='".$ip."'");
            $result = mysqli_fetch_assoc($query_ip);
            if ($result == null) {
                break;
            }
            else {
                $i++;
            }

        }
        $update_ip = mysqli_query($link, "UPDATE `users` SET ip = '".$ip."' WHERE username = '".$username."'");
    }
?>