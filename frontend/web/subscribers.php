<?php

$file = __DIR__ . '/subscribers.csv';
//открываем файл с CSV-данными
$fh = fopen($file, "r");

// делаем пропуск первой строки, смещая указатель на одну строку
fgetcsv($fh, 0, ',');

$sqltext = ob_start();
?>
-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.50 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Дамп данных таблицы testing-online-backup.subscribers: ~15 474 rows (приблизительно)
DELETE FROM `subscribers`;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` (`id`, `type_id`, `event`, `client`, `blocked`, `date_create`, `date_update`) VALUES
<?php
$fp = file($file);

//читаем построчно содержимое CSV-файла
$i=1;
while (($row = fgetcsv($fh, 0, ';')) !== false) {
    $id = $row[0]; //ID
    $type = $row[1]; //Тип
    $fullname = $row[2]; //Полное имя контакта
    $name = $row[3]; //Имя
    $last_name = $row[4]; //Фамилия
    $company_name = $row[5]; //Название компании
    $owner_name = $row[6]; //Ответственный
    $date_contact_create = $row[7]; //Дата создания контакта
    $how_contact_create = $row[8]; //Кем создан контакт
    $sdelka = $row[9]; //Сделки
    $date_edit_contact = $row[10]; //Дата редактирования
    $owner_edit_contact = $row[11]; //Кем редактирован
    $tags = $row[12]; //Теги
    $notice1 = $row[13]; //Примечание 1
    $notice2 = $row[14]; //Примечание 2
    $notice3 = $row[15]; //Примечание 3
    $notice4 = $row[16]; //Примечание 4
    $notice5 = $row[17]; //Примечание 5
    $work_phone = $row[18]; //Рабочий телефон
    $work_direct_phone = $row[19]; //Рабочий прямой телефон
    $mobile_phone = $row[20]; //Мобильный телефон
    $faks = $row[21]; //Мобильный телефон
    $home_phone = $row[22]; //Домашний телефон
    $other_phone = $row[23]; //Другой телефон
    $work_email = $row[24]; //Рабочий email
    $owner_email = $row[25]; //Личный email
    $other_email = $row[26]; //Другой email
    $web_url = $row[27]; //Web
    $address = $row[28]; //Адрес
    $position_work = $row[29]; //Должность
    $C1 = $row[30]; //C1
    $C2 = $row[31]; //C2

?>
(<?=$id?>, 1, 12, '<?=$owner_email?>', 2, '<?=$date_contact_create?>', '<?=$sdelka?>')<?php if((count($fp)-1)!=$i){?>,<? } else {?>;<? } echo "\n";?>
<?php
    $i++;
}
?>
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
<?php

$sqltext = ob_get_contents();
ob_end_clean();

file_put_contents("subscribers.example.sql",$sqltext);
?>
