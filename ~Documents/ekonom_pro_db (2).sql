-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 23 2011 г., 23:34
-- Версия сервера: 5.1.50
-- Версия PHP: 5.3.8-ZS5.5.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ekonom_pro_db`
--

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `title`, `phone_code`) VALUES
(1, 'Кемерово', '3842'),
(2, 'Новокузнецк', '3843');

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role_id`, `date_create`, `company_id`) VALUES
(1, 'admin', '123', 1, '2011-11-23 05:00:00', NULL);

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `title`) VALUES
(1, 'admin');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
