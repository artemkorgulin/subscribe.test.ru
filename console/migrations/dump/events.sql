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
-- Дамп данных таблицы subscribe-test-backup.events: ~15 474 rows (приблизительно)
DELETE FROM `events`;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `name`, `date_create`, `date_update`) VALUES
(12, 'Регистрация', '01.03.2023 00:23:53', '01.03.2023 00:23:53'),
(13, 'Верификация', '25.01.2023 11:45:25', '01.03.2023 00:23:53'),
(14, 'Вход', '26.01.2023 01:52:14', '01.03.2023 00:23:53'),
(15, 'Отправка сообщения', '26.01.2023 01:52:14', '01.03.2023 00:23:53'),
(16, 'Выход', '26.01.2023 01:52:14', '01.03.2023 00:23:53');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
