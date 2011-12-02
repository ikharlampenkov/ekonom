-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Хост: ekonom.mysql
-- Время создания: Дек 01 2011 г., 20:59
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `company_address`
--

INSERT INTO `company_address` (`id`, `company_id`, `city_id`, `address`, `phone`) VALUES
(1, 1, 1, 'Ленина, 64', '(3842) 21-01-01'),
(2, 1, 1, 'Ленина, 137', '(3842) 28-08-08');

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
-- Структура таблицы `product`
--
-- Создание: Дек 01 2011 г., 17:34
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_rubric_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `short_text` varchar(255) DEFAULT NULL,
  `full_text` text,
  `price` decimal(12,2) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_product_rubric1` (`product_rubric_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `product_rubric_id`, `title`, `img`, `short_text`, `full_text`, `price`) VALUES
(1, 3, 'Апельсин', 'img_30-06-2011-21-19-07.jpg', 'Просто апельсин', 'Детальная информация об апельсинах', 100.00),
(3, 3, 'Вишня', 'img_30-06-2011-21-11-19.jpg', 'Просто вишня', 'Просто сладкая вишня', 250.00),
(4, 5, 'Моющее средство', NULL, 'паоапоаппаоапоап', 'овпоапоапоап', 234.00),
(11, 1, 'полплпрлп', NULL, '', '', 125.50);

-- --------------------------------------------------------

--
-- Структура таблицы `product_rubric`
--
-- Создание: Дек 01 2011 г., 17:35
--

DROP TABLE IF EXISTS `product_rubric`;
CREATE TABLE IF NOT EXISTS `product_rubric` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_product_rubric_product_rubric` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `product_rubric`
--

INSERT INTO `product_rubric` (`id`, `title`, `parent_id`, `is_root`) VALUES
(1, 'root', NULL, 1),
(2, 'Продовольственные товары', 1, 0),
(3, 'Фрукты', 2, 0),
(4, 'Непродовольственные товары', 1, 0),
(5, 'Бытовая химия', 4, 0),
(6, 'Одежда', 4, 0),
(8, 'Овощи', 2, 0);

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
-- Структура таблицы `tm_acl_role`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_acl_role`;
CREATE TABLE IF NOT EXISTS `tm_acl_role` (
  `tm_user_role_id` int(10) unsigned NOT NULL,
  `tm_user_resource_id` int(10) unsigned NOT NULL,
  `is_allow` tinyint(1) NOT NULL DEFAULT '0',
  `privileges` varchar(255) NOT NULL,
  PRIMARY KEY (`tm_user_role_id`,`tm_user_resource_id`),
  KEY `tm_user_resource_id` (`tm_user_resource_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tm_acl_role`
--

INSERT INTO `tm_acl_role` (`tm_user_role_id`, `tm_user_resource_id`, `is_allow`, `privileges`) VALUES
(1, 1, 1, 'show'),
(1, 2, 1, 'show'),
(1, 3, 1, 'show'),
(1, 4, 1, 'show'),
(1, 5, 1, 'show'),
(1, 6, 1, 'show'),
(1, 7, 1, 'show'),
(1, 8, 1, 'show'),
(1, 15, 1, 'show'),
(1, 19, 1, 'show'),
(1, 20, 1, 'show'),
(1, 21, 1, 'show'),
(1, 22, 1, 'show'),
(1, 23, 1, 'show'),
(1, 24, 1, 'show'),
(1, 25, 1, 'show'),
(1, 59, 1, 'show'),
(1, 67, 1, 'show'),
(1, 68, 1, 'show'),
(1, 69, 1, 'show'),
(1, 70, 1, 'show'),
(1, 71, 1, 'show'),
(1, 72, 1, 'show'),
(1, 76, 1, 'show'),
(1, 77, 1, 'show'),
(1, 78, 1, 'show'),
(1, 79, 1, 'show'),
(1, 80, 1, 'show'),
(1, 81, 1, 'show'),
(1, 82, 1, 'show'),
(1, 83, 1, 'show'),
(1, 84, 1, 'show'),
(1, 85, 1, 'show'),
(1, 86, 1, 'show'),
(3, 1, 1, 'show'),
(3, 2, 1, 'show'),
(3, 3, 1, 'show'),
(3, 4, 1, 'show'),
(3, 5, 0, 'show'),
(3, 6, 0, 'show'),
(3, 7, 0, 'show'),
(3, 8, 0, 'show'),
(3, 15, 0, 'show'),
(3, 19, 0, 'show'),
(3, 20, 0, 'show'),
(3, 21, 0, 'show'),
(3, 22, 0, 'show'),
(3, 23, 0, 'show'),
(3, 24, 0, 'show'),
(3, 25, 0, 'show'),
(3, 59, 0, 'show'),
(3, 67, 0, 'show'),
(3, 68, 0, 'show'),
(3, 69, 0, 'show'),
(3, 70, 0, 'show'),
(3, 71, 0, 'show'),
(3, 72, 0, 'show'),
(4, 1, 1, 'show'),
(4, 2, 1, 'show'),
(4, 3, 1, 'show'),
(4, 4, 1, 'show'),
(4, 5, 0, 'show'),
(4, 6, 0, 'show'),
(4, 7, 0, 'show'),
(4, 8, 0, 'show'),
(4, 15, 0, 'show'),
(4, 19, 0, 'show'),
(4, 20, 0, 'show'),
(4, 21, 0, 'show'),
(4, 22, 0, 'show'),
(4, 23, 0, 'show'),
(4, 24, 0, 'show'),
(4, 25, 0, 'show'),
(4, 59, 0, 'show'),
(4, 67, 0, 'show'),
(4, 68, 0, 'show'),
(4, 69, 0, 'show'),
(4, 70, 0, 'show'),
(4, 71, 0, 'show'),
(4, 72, 0, 'show'),
(4, 76, 1, 'show'),
(4, 77, 1, 'show'),
(4, 78, 0, 'show'),
(4, 79, 0, 'show'),
(4, 80, 1, 'show'),
(4, 81, 1, 'show'),
(4, 82, 0, 'show'),
(4, 83, 1, 'show'),
(4, 84, 0, 'show'),
(4, 85, 1, 'show'),
(4, 86, 1, 'show'),
(5, 1, 1, 'show'),
(5, 2, 1, 'show'),
(5, 3, 1, 'show'),
(5, 4, 1, 'show'),
(5, 5, 0, 'show'),
(5, 6, 0, 'show'),
(5, 7, 0, 'show'),
(5, 8, 0, 'show'),
(5, 15, 0, 'show'),
(5, 19, 0, 'show'),
(5, 20, 0, 'show'),
(5, 21, 0, 'show'),
(5, 22, 0, 'show'),
(5, 23, 0, 'show'),
(5, 24, 0, 'show'),
(5, 25, 0, 'show'),
(5, 59, 0, 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_task_attribute`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_task_attribute`;
CREATE TABLE IF NOT EXISTS `tm_task_attribute` (
  `task_id` int(10) unsigned NOT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `attribute_value` text NOT NULL,
  `is_fill` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`task_id`,`attribute_key`),
  KEY `fk_tm_task_attribute_tm_task_attribute_type1` (`type_id`),
  KEY `fk_tm_task_attribute_tm_task1` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tm_task_attribute`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tm_task_attribute_type`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_task_attribute_type`;
CREATE TABLE IF NOT EXISTS `tm_task_attribute_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `handler` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tm_task_attribute_type`
--

INSERT INTO `tm_task_attribute_type` (`id`, `title`, `handler`, `description`) VALUES
(1, 'Строка', 'TM_Attribute_AttributeType', 'Любое строковое значение'),
(2, 'Текст', 'TM_Attribute_AttributeTypeText', 'Многострочный  текст'),
(3, 'Список', 'TM_Attribute_AttributeTypeList', 'Список из возможных вариантов'),
(4, 'Дата', 'TM_Attribute_AttributeTypeDate', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_task_hash`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_task_hash`;
CREATE TABLE IF NOT EXISTS `tm_task_hash` (
  `task_id` int(10) unsigned DEFAULT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `list_value` text,
  PRIMARY KEY (`attribute_key`),
  KEY `fk_tm_task_hash_tm_task_attribute_type1` (`type_id`),
  KEY `fk_tm_task_hash_tm_task1` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tm_task_hash`
--

INSERT INTO `tm_task_hash` (`task_id`, `attribute_key`, `title`, `type_id`, `list_value`) VALUES
(NULL, 'description', 'Текстовое описание задачи', 1, ''),
(NULL, 'description2', 'description', 2, ' '),
(NULL, 'full_text', 'Большой текст', 2, ''),
(NULL, 'test_list', 'Проверка списка', 3, 'Один||Два||Три '),
(NULL, 'Срок', 'Срок выполнения задачи', 4, ' ');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE IF NOT EXISTS `tm_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_tm_user_tm_user_role1` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tm_user`
--

INSERT INTO `tm_user` (`id`, `login`, `password`, `role_id`, `date_create`) VALUES
(1, 'admin', '123', 1, '2011-11-16 16:26:11'),
(2, 'user', '321', 4, '2011-11-17 23:35:18'),
(6, 'user2', '333', 4, '2011-11-25 21:50:32');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_attribute`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user_attribute`;
CREATE TABLE IF NOT EXISTS `tm_user_attribute` (
  `user_id` int(10) unsigned NOT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `attribute_value` text NOT NULL,
  `is_fill` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`attribute_key`),
  KEY `fk_tm_task_attribute_tm_task1` (`user_id`),
  KEY `fk_tm_document_attribute_tm_document_attribute_type1` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tm_user_attribute`
--

INSERT INTO `tm_user_attribute` (`user_id`, `attribute_key`, `type_id`, `attribute_value`, `is_fill`) VALUES
(2, 'name', 1, 'Первый пользователь', 1),
(6, 'name', 1, 'Второй пользователь', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_attribute_type`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user_attribute_type`;
CREATE TABLE IF NOT EXISTS `tm_user_attribute_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `handler` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tm_user_attribute_type`
--

INSERT INTO `tm_user_attribute_type` (`id`, `title`, `handler`, `description`) VALUES
(1, 'Строка', 'TM_Attribute_AttributeType', 'Любое строковое значение'),
(2, 'Текст', 'TM_Attribute_AttributeTypeText', 'Многострочный  текст'),
(3, 'Список', 'TM_Attribute_AttributeTypeList', 'Список из возможных вариантов');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_hash`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user_hash`;
CREATE TABLE IF NOT EXISTS `tm_user_hash` (
  `user_id` int(10) unsigned DEFAULT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `list_value` text,
  PRIMARY KEY (`attribute_key`),
  KEY `fk_tm_document_hash_tm_task_attribute_type1` (`type_id`),
  KEY `fk_tm_document_hash_tm_task1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tm_user_hash`
--

INSERT INTO `tm_user_hash` (`user_id`, `attribute_key`, `title`, `type_id`, `list_value`) VALUES
(NULL, 'name', 'Имя', 1, ' ');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_profile`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user_profile`;
CREATE TABLE IF NOT EXISTS `tm_user_profile` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_key` varchar(255) NOT NULL,
  `profile_value` text NOT NULL,
  PRIMARY KEY (`user_id`,`profile_key`),
  KEY `fk_tm_user_profile_tm_user1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tm_user_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_resource`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user_resource`;
CREATE TABLE IF NOT EXISTS `tm_user_resource` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Дамп данных таблицы `tm_user_resource`
--

INSERT INTO `tm_user_resource` (`id`, `title`) VALUES
(85, 'catalog'),
(86, 'catalog/index'),
(76, 'city'),
(78, 'city/add'),
(79, 'city/edit'),
(77, 'city/index'),
(80, 'company'),
(82, 'company/add'),
(84, 'company/delete'),
(83, 'company/edit'),
(81, 'company/index'),
(4, 'index/index'),
(1, 'login'),
(2, 'login/index'),
(3, 'login/logout'),
(5, 'user'),
(6, 'user/add'),
(70, 'user/addAttributeHash'),
(67, 'user/addAttributeType'),
(22, 'user/addResource'),
(19, 'user/addRole'),
(8, 'user/delete'),
(72, 'user/deleteAttributeHash'),
(69, 'user/deleteAttributeType'),
(24, 'user/deleteResource'),
(21, 'user/deleteRole'),
(7, 'user/edit'),
(71, 'user/editAttributeHash'),
(68, 'user/editAttributeType'),
(23, 'user/editResource'),
(20, 'user/editRole'),
(25, 'user/fillResource'),
(15, 'user/index'),
(59, 'user/showRoleAcl');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_role`
--
-- Создание: Дек 01 2011 г., 16:48
--

DROP TABLE IF EXISTS `tm_user_role`;
CREATE TABLE IF NOT EXISTS `tm_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tm_user_role`
--

INSERT INTO `tm_user_role` (`id`, `title`) VALUES
(1, 'admin'),
(3, 'customer'),
(4, 'companyadmin'),
(5, 'guest');

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
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_product_rubric1` FOREIGN KEY (`product_rubric_id`) REFERENCES `product_rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product_rubric`
--
ALTER TABLE `product_rubric`
  ADD CONSTRAINT `fk_product_rubric_product_rubric` FOREIGN KEY (`parent_id`) REFERENCES `product_rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `rubric`
--
ALTER TABLE `rubric`
  ADD CONSTRAINT `fk_rubric_rubric1` FOREIGN KEY (`parent_id`) REFERENCES `rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tm_acl_role`
--
ALTER TABLE `tm_acl_role`
  ADD CONSTRAINT `tm_acl_role_ibfk_1` FOREIGN KEY (`tm_user_role_id`) REFERENCES `tm_user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tm_acl_role_ibfk_2` FOREIGN KEY (`tm_user_resource_id`) REFERENCES `tm_user_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tm_task_attribute`
--
ALTER TABLE `tm_task_attribute`
  ADD CONSTRAINT `tm_task_attribute_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tm_task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tm_task_attribute_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `tm_task_attribute_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tm_task_hash`
--
ALTER TABLE `tm_task_hash`
  ADD CONSTRAINT `fk_tm_task_hash_tm_task1` FOREIGN KEY (`task_id`) REFERENCES `tm_task` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tm_task_hash_tm_task_attribute_type1` FOREIGN KEY (`type_id`) REFERENCES `tm_task_attribute_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `tm_user`
--
ALTER TABLE `tm_user`
  ADD CONSTRAINT `tm_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tm_user_role` (`id`);

--
-- Ограничения внешнего ключа таблицы `tm_user_attribute`
--
ALTER TABLE `tm_user_attribute`
  ADD CONSTRAINT `tm_user_attribute_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tm_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tm_user_attribute_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `tm_user_attribute_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tm_user_hash`
--
ALTER TABLE `tm_user_hash`
  ADD CONSTRAINT `tm_user_hash_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `tm_user_attribute_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
