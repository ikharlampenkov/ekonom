-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Хост: ekonom.mysql
-- Время создания: Ноя 25 2011 г., 19:16
-- Версия сервера: 5.1.41
-- Версия PHP: 5.2.10

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ekonom_pro_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `phone_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `title`, `phone_code`) VALUES
(1, 'Кемерово', '3842'),
(2, 'Новокузнецк', '3843');

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--
-- Создание: Ноя 24 2011 г., 08:53
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_company_city1` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `city_id`, `title`, `file`, `description`) VALUES
(1, 1, 'Первая компания', '', ''),
(2, 1, 'Вторая компания', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `company_address`
--
-- Создание: Ноя 24 2011 г., 08:53
--

DROP TABLE IF EXISTS `company_address`;
CREATE TABLE IF NOT EXISTS `company_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `company_address`
--


-- --------------------------------------------------------

--
-- Структура таблицы `content_page`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `content_page`;
CREATE TABLE IF NOT EXISTS `content_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_title` varchar(40) NOT NULL COMMENT 'английское название для системы',
  `title` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_title_UNIQUE` (`page_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `content_page`
--


-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `rubric_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`rubric_id`),
  KEY `fk_goods_rubric1` (`rubric_id`),
  KEY `fk_goods_company1` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `goods`
--


-- --------------------------------------------------------

--
-- Структура таблицы `goods_hash`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `goods_hash`;
CREATE TABLE IF NOT EXISTS `goods_hash` (
  `rubric_id` int(10) unsigned NOT NULL,
  `attribute_key` varchar(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `list_value` varchar(45) DEFAULT NULL,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rubric_id`,`attribute_key`),
  KEY `fk_goods_hash_rubric1` (`rubric_id`),
  KEY `fk_goods_hash_goods_attribute_type1` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_hash`
--


-- --------------------------------------------------------

--
-- Структура таблицы `rubric`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `rubric`;
CREATE TABLE IF NOT EXISTS `rubric` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rubric_rubric1` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `rubric`
--


-- --------------------------------------------------------

--
-- Структура таблицы `user`
--
-- Создание: Ноя 24 2011 г., 08:48
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_tm_user_tm_user_role1` (`role_id`),
  KEY `fk_user_company1` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `role_id`, `date_create`, `company_id`) VALUES
(1, 'admin', '123', 1, '2011-11-23 05:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_attribute`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `user_attribute`;
CREATE TABLE IF NOT EXISTS `user_attribute` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_key` varchar(255) NOT NULL,
  `attribute_value` text NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`attribute_key`),
  KEY `fk_tm_user_profile_tm_user1` (`user_id`),
  KEY `fk_tm_user_profile_user_hash1` (`attribute_key`),
  KEY `fk_user_attribute_user_attribute_type1` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `user_attribute`
--


-- --------------------------------------------------------

--
-- Структура таблицы `user_attribute_type`
--
-- Создание: Ноя 23 2011 г., 22:43
--

DROP TABLE IF EXISTS `user_attribute_type`;
CREATE TABLE IF NOT EXISTS `user_attribute_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `handler` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `user_attribute_type`
--


-- --------------------------------------------------------

--
-- Структура таблицы `user_hash`
--
-- Создание: Ноя 23 2011 г., 22:44
--

DROP TABLE IF EXISTS `user_hash`;
CREATE TABLE IF NOT EXISTS `user_hash` (
  `attribute_key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `list_value` text,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`attribute_key`),
  KEY `fk_user_hash_user_attribute_type1` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_hash`
--


-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--
-- Создание: Ноя 24 2011 г., 08:48
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'companyadmin'),
(3, 'customer');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `company_address`
--
ALTER TABLE `company_address`
  ADD CONSTRAINT `company_address_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `company_address_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `fk_goods_rubric1` FOREIGN KEY (`rubric_id`) REFERENCES `rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goods_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `goods_hash`
--
ALTER TABLE `goods_hash`
  ADD CONSTRAINT `fk_goods_hash_rubric1` FOREIGN KEY (`rubric_id`) REFERENCES `rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_goods_hash_goods_attribute_type1` FOREIGN KEY (`type_id`) REFERENCES `goods_attribute_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `rubric`
--
ALTER TABLE `rubric`
  ADD CONSTRAINT `fk_rubric_rubric1` FOREIGN KEY (`parent_id`) REFERENCES `rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_attribute`
--
ALTER TABLE `user_attribute`
  ADD CONSTRAINT `fk_tm_user_profile_tm_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tm_user_profile_user_hash1` FOREIGN KEY (`attribute_key`) REFERENCES `user_hash` (`attribute_key`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_attribute_user_attribute_type1` FOREIGN KEY (`type_id`) REFERENCES `user_attribute_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_hash`
--
ALTER TABLE `user_hash`
  ADD CONSTRAINT `fk_user_hash_user_attribute_type1` FOREIGN KEY (`type_id`) REFERENCES `user_attribute_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
