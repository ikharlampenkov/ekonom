-- phpMyAdmin SQL Dump
-- version 
-- http://www.phpmyadmin.net
--
-- Хост: ekonom.mysql
-- Время создания: Дек 30 2011 г., 21:19
-- Версия сервера: 5.1.41
-- Версия PHP: 5.2.10

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

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--
-- Создание: Дек 28 2011 г., 05:43
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `img`, `link`, `title`) VALUES
(1, 'img_28-12-2011-16-03-17.jpg', 'ekonom.pro', 'Клуб ярких путешествий «Мир Без Границ»'),
(2, 'img_28-12-2011-13-38-35.jpg', 'ekonom.pro', 'Еще тест'),
(4, 'img_28-12-2011-14-11-32.jpg', 'ekonom.pro', 'Счастья!'),
(5, 'img_29-12-2011-12-47-06.jpg', 'ekonom.pro', 'Мир Без Границ'),
(6, 'img_30-12-2011-11-06-14.jpg', 'ekonom.pro', 'Удачи!');

-- --------------------------------------------------------

--
-- Структура таблицы `banner_place`
--
-- Создание: Дек 28 2011 г., 06:12
--

DROP TABLE IF EXISTS `banner_place`;
CREATE TABLE IF NOT EXISTS `banner_place` (
  `banner_id` int(10) unsigned NOT NULL,
  `bplace_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`banner_id`,`bplace_id`),
  KEY `fk_banner_place_banner1` (`banner_id`),
  KEY `bplace_id` (`bplace_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banner_place`
--

INSERT INTO `banner_place` (`banner_id`, `bplace_id`) VALUES
(1, 1),
(2, 2),
(2, 6),
(4, 1),
(5, 4),
(5, 5),
(6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `bplace`
--
-- Создание: Дек 28 2011 г., 05:44
--

DROP TABLE IF EXISTS `bplace`;
CREATE TABLE IF NOT EXISTS `bplace` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `bplace`
--

INSERT INTO `bplace` (`id`, `title`, `width`, `height`) VALUES
(1, 'Главная', 994, 230),
(2, 'Справа от компании', 187, 357),
(4, 'На главной снизу справа', 490, 83),
(5, 'На главной снизу слева', 490, 83),
(6, 'Справа от компании нижний', 187, 357);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `phone_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `title`, `phone_code`) VALUES
(1, 'Кемерово', '3842'),
(2, 'Новокузнецк', '3843'),
(3, 'Москва', '495');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_create` datetime NOT NULL,
  `user` varchar(20) NOT NULL,
  `is_moderate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `message`, `date_create`, `user`, `is_moderate`) VALUES
(1, 'ghgdhdhfhdfhdfhfdhdreye', '2011-12-27 00:00:00', 'dhhfhdf', 1),
(3, 'Хочу туда. Пошлите меня пожалуйста!!!', '2011-12-28 00:00:00', 'Константин', 0),
(4, 'Хочу туда. Пошлите меня пожалуйста!!!', '2011-12-28 00:00:00', 'Константин', 0),
(5, 'Хочу туда. Пошлите меня пожалуйста!!!', '2011-12-28 00:00:00', 'Константин', 0),
(6, 'Хочу туда. Пошлите меня пожалуйста!!!', '2011-12-28 00:00:00', 'Константин', 0),
(7, 'Прям не цены, а сказки!!! Хочу, летим!!!)))', '2011-12-30 00:00:00', 'Никита', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comments_product`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `comments_product`;
CREATE TABLE IF NOT EXISTS `comments_product` (
  `comments_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`comments_id`,`product_id`),
  KEY `fk_comments_product_product1` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments_product`
--

INSERT INTO `comments_product` (`comments_id`, `product_id`) VALUES
(1, 11),
(3, 15),
(4, 15),
(5, 15),
(6, 15),
(7, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `description` text,
  `order_email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_company_city1` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `city_id`, `title`, `file`, `description`, `order_email`) VALUES
(3, 3, 'Адидас', 'file_27-12-2011-15-37-39.jpg', 'Адидас - просто класс!!!', 'nikencmoscow@yandex.ru'),
(4, 1, 'Мир Без Границ', 'img_28-12-2011-15-24-28.jpg', 'Для ценителей солнца и моря клуб ярких путешествий \\"МИР БЕЗ ГРАНИЦ\\" предоставляет широкий спектр туристических услуг полного цикла, у нас можно осуществить подбор туров, заказать путевки оптимальные по соотношению «цена-качество», к тому же получить скидку. С нами вы можете посетить любой уголок земного шара!\r\nНаши потенциальные клиенты – те, кому важны не только относительно низкая цена путевок, но и качество заявленных услуг. Семейный отдых или романтическое путешествие, в пределах России и за границей, туристический поход или интересное спортивное мероприятие – вот далеко неполный перечень услуг клуба \\"МИР БЕЗ ГРАНИЦ\\".', 'mir-tour2011@ya.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `company_address`
--
-- Создание: Дек 28 2011 г., 07:53
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `company_address`
--

INSERT INTO `company_address` (`id`, `company_id`, `city_id`, `address`, `phone`) VALUES
(3, 4, 1, 'ул. Кирова 51', '+7 (3842) 33-08-88'),
(4, 4, 1, 'пр. Ленина, 51 б, офис 15', '+7 (923) 602-26-43, Юлия');

-- --------------------------------------------------------

--
-- Структура таблицы `company_user`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `company_user`;
CREATE TABLE IF NOT EXISTS `company_user` (
  `company_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `is_write` tinyint(1) NOT NULL DEFAULT '0',
  `is_moderate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`company_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company_user`
--

INSERT INTO `company_user` (`company_id`, `user_id`, `is_read`, `is_write`, `is_moderate`) VALUES
(3, 8, 0, 0, 1),
(4, 9, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `content_page`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `content_page`;
CREATE TABLE IF NOT EXISTS `content_page` (
  `page_title` varchar(40) NOT NULL COMMENT 'английское название для системы',
  `title` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`page_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `content_page`
--

INSERT INTO `content_page` (`page_title`, `title`, `content`) VALUES
('about', 'О нас', '<p>\r\n	Постиндустриализм представляет собой прагматический гуманизм (терминология М.Фуко). Важным для нас является указание Маклюэна на то, что капиталистическое мировое общество приводит институциональный коммунизм, подчеркивает президент. Постиндустриализм обретает референдум, впрочем, это несколько расходится с концепцией Истона. Понятие политического участия, согласно традиционным представлениям, ограничивает гносеологический марксизм, подчеркивает президент. Тоталитарный тип политической культуры неравномерен. Конфедерация вероятна. ПроверкаКонтактов</p>\r\n'),
('contacts', 'Контактная информация', '<p>\r\n	Как уже отмечалось, политические учения Гоббса иллюстрирует механизм власти, хотя на первый взгляд, российские власти тут ни при чем. Политическая модернизация, однако, сохраняет экзистенциальный субъект власти, что неминуемо повлечет эскалацию напряжения в стране. Харизматическое лидерство доказывает марксизм, последнее особенно ярко выражено в ранних работах В.И.Ленина. Структура политической науки существенно доказывает плюралистический христианско-демократический национализм (отметим, что это особенно важно для гармонизации политических интересов и интеграции общества). Согласно теории Э.Тоффлера (&quot;Шок будущего&quot;), авторитаризм интегрирует онтологический кризис легитимности, о чем будет подробнее сказано ниже. Политическое манипулирование приводит прагматический элемент политического процесса (отметим, что это особенно важно для гармонизации политических интересов и интеграции общества). ПроверкаРедактора</p>\r\n'),
('test', 'Тест', '<p>\r\n	аптьаптаптпатаптпатптпатм мс рвава</p>\r\n<p>\r\n	вараврва</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tm_document_tm_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `date_create`, `user_id`, `file`) VALUES
(1, 'Первое фото', '2011-12-18 23:10:50', 1, 'img_18-12-2011-23-10-50.jpg'),
(2, 'Второе фото', '2011-12-18 23:27:19', 1, 'img_18-12-2011-23-27-19.jpg'),
(3, 'Треть фото', '2011-12-18 23:28:11', 1, 'img_18-12-2011-23-28-11.jpg'),
(4, 'Четвертое фото', '2011-12-18 23:28:27', 1, 'img_18-12-2011-23-28-27.jpg'),
(5, 'Первое фото', '2011-12-26 16:28:21', 1, 'img_26-12-2011-16-28-21.jpg'),
(6, 'Второе фото', '2011-12-26 16:30:43', 1, 'img_26-12-2011-16-30-43.jpg'),
(7, 'Третье фото', '2011-12-26 16:30:58', 1, 'img_26-12-2011-16-30-58.jpg'),
(8, 'Четвертое фото', '2011-12-26 16:31:15', 1, 'img_26-12-2011-16-31-15.jpg'),
(9, 'Первое фото!', '2011-12-27 14:09:26', 8, 'img_27-12-2011-14-09-26.jpg'),
(10, 'Второе фото!', '2011-12-27 14:09:45', 8, 'img_27-12-2011-14-09-45.jpg'),
(11, 'Третье фото!', '2011-12-27 14:10:07', 8, 'img_27-12-2011-14-10-07.jpg'),
(12, 'ОАЭ', '2011-12-28 14:39:04', 1, 'img_28-12-2011-14-39-04.jpg'),
(13, 'ОАЭ', '2011-12-28 14:39:18', 1, 'img_28-12-2011-14-39-18.jpg'),
(14, 'ОАЭ', '2011-12-28 14:39:30', 1, 'img_28-12-2011-14-39-30.jpg'),
(19, 'Тайланд.', '2011-12-28 16:33:51', 9, 'img_28-12-2011-16-33-52.jpg'),
(20, 'Тайланд.', '2011-12-28 16:46:44', 9, 'img_28-12-2011-16-46-44.jpg'),
(21, 'Тайланд.', '2011-12-28 16:46:56', 9, 'img_28-12-2011-16-46-56.jpg'),
(22, 'оаэ', '2011-12-29 17:55:05', 9, 'img_29-12-2011-17-55-05.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_company`
--
-- Создание: Дек 28 2011 г., 07:53
--

DROP TABLE IF EXISTS `gallery_company`;
CREATE TABLE IF NOT EXISTS `gallery_company` (
  `gallery_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  KEY `fk_tm_task_document_tm_document1` (`gallery_id`),
  KEY `fk_gallery_company_company1` (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_company`
--

INSERT INTO `gallery_company` (`gallery_id`, `company_id`) VALUES
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_product`
--
-- Создание: Дек 28 2011 г., 07:54
--

DROP TABLE IF EXISTS `gallery_product`;
CREATE TABLE IF NOT EXISTS `gallery_product` (
  `gallery_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gallery_id`,`product_id`),
  KEY `fk_table1_product1` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery_product`
--

INSERT INTO `gallery_product` (`gallery_id`, `product_id`) VALUES
(9, 14),
(10, 14),
(11, 14),
(19, 15),
(20, 15),
(21, 15),
(22, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--
-- Создание: Дек 27 2011 г., 16:34
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
  `company_id` int(10) unsigned NOT NULL,
  `on_first_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_product_product_rubric1` (`product_rubric_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `product_rubric_id`, `title`, `img`, `short_text`, `full_text`, `price`, `company_id`, `on_first_page`) VALUES
(11, 1, 'полплпрлп', NULL, '', '', 125.50, 3, 1),
(14, 6, 'Косюм!', 'img_27-12-2011-14-05-19.jpg', 'Хорошая вещь!', 'Хорошая вещь!', 1000.00, 3, 0),
(15, 9, 'Таиланд! 12 дней! 21.01.2012', 'img_30-12-2011-13-48-12.jpg', '', 'Прямой вылет из Кемерово в Паттайю! 21 января 2012! на 12 дней!\r\nЦена указана на 1 человека при условии 2х местного размещения!\r\n\r\nОтели 3 — от 24000 т. р.\r\nОтели 4 — от 28500 т. р.\r\nОтели 5* — от 37500 т. р.\r\n\r\nСПЕШИТЕ БРОНИРОВАТЬ! РЕЙСЫ РАСКУПАЮТСЯ!', 29400.00, 4, 1),
(16, 9, 'ОАЭ 24.01.2012 7 дней! ', 'img_30-12-2011-13-52-01.jpg', 'Горящий тур в ОАЭ из Новосибирска! Вылеты по вторникам и субботам! Горящий на 24.01.2012 — 7 дней / 6 ночей!', 'Горящий тур в ОАЭ из Новосибирска! Вылеты по вторникам и субботам! Горящий на 24.01.2012 — 7 дней / 6 ночей! Дополнительно оплачивается виза 75 у. е. с человека! Есть туры на 14 дней! Цену нужно уточнять! Цена указана на 1 человека при условии 2х местного размещения!\r\n\r\nДубаи — город — от 17500 т. р.\r\n\r\nЭмират Фуджейра! Пляжные отели, первая береговая линия.\r\nFUJAIRAH ROTANA RESORT & SPA 5 — 22000 т. р.\r\nHILTON FUJAIRAH 5 — 25000 т. р.\r\nLE MERIDIEN AL AQAH BEACH RESO 5* — 25500 т. р.\r\n\r\nПитание только завтраки! (Возможно купить концепцию завтрак+ужин)\r\n', 21000.00, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_attribute`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `product_attribute`;
CREATE TABLE IF NOT EXISTS `product_attribute` (
  `product_id` int(10) unsigned NOT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `attribute_value` text NOT NULL,
  `is_fill` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`,`attribute_key`),
  KEY `fk_tm_task_attribute_tm_task_attribute_type1` (`type_id`),
  KEY `fk_tm_task_attribute_tm_task1` (`product_id`),
  KEY `attribute_key` (`attribute_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_attribute`
--

INSERT INTO `product_attribute` (`product_id`, `attribute_key`, `type_id`, `attribute_value`, `is_fill`) VALUES
(11, 'description', 1, '', 0),
(11, 'discount', 1, '25', 0),
(11, 'discount_type', 3, '%', 0),
(11, 'second_price', 1, '', 0),
(11, 'terms_of_stock', 2, '', 0),
(14, 'description', 2, 'Хорошая скидка', 0),
(14, 'discount', 1, '50 %', 0),
(14, 'second_price', 1, '500', 0),
(14, 'terms_of_stock', 2, '1 января', 0),
(15, 'description', 2, '', 0),
(15, 'discount', 1, '20', 0),
(15, 'discount_type', 3, '%', 0),
(15, 'second_price', 1, '24500', 0),
(15, 'terms_of_stock', 2, '', 0),
(16, 'description', 2, '', 0),
(16, 'discount', 1, '20', 0),
(16, 'discount_type', 3, '%', 0),
(16, 'second_price', 1, '17500', 0),
(16, 'terms_of_stock', 2, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product_attribute_type`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `product_attribute_type`;
CREATE TABLE IF NOT EXISTS `product_attribute_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `handler` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `product_attribute_type`
--

INSERT INTO `product_attribute_type` (`id`, `title`, `handler`, `description`) VALUES
(1, 'Строка', 'TM_Attribute_AttributeType', 'Любое строковое значение'),
(2, 'Текст', 'TM_Attribute_AttributeTypeText', 'Многострочный  текст'),
(3, 'Список', 'TM_Attribute_AttributeTypeList', 'Список из возможных вариантов'),
(4, 'Дата', 'TM_Attribute_AttributeTypeDate', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product_hash`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `product_hash`;
CREATE TABLE IF NOT EXISTS `product_hash` (
  `product_id` int(10) unsigned DEFAULT NULL,
  `attribute_key` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `list_value` text,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int(10) unsigned NOT NULL DEFAULT '10000',
  PRIMARY KEY (`attribute_key`),
  KEY `fk_tm_task_hash_tm_task_attribute_type1` (`type_id`),
  KEY `fk_tm_task_hash_tm_task1` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_hash`
--

INSERT INTO `product_hash` (`product_id`, `attribute_key`, `title`, `type_id`, `list_value`, `required`, `sort_order`) VALUES
(NULL, 'description', 'Описание акции', 2, ' ', 0, 10000),
(NULL, 'discount', 'Скидка', 1, '    ', 1, 1),
(NULL, 'discount_type', 'В чем измеряется скидка', 3, '*%||р.||$||€  ', 1, 2),
(NULL, 'second_price', 'Цена со скидкой', 1, ' ', 0, 1000),
(NULL, 'terms_of_stock', 'Условия и сроки проведения', 2, ' ', 0, 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `product_rubric`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `product_rubric`;
CREATE TABLE IF NOT EXISTS `product_rubric` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_product_rubric_product_rubric` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `product_rubric`
--

INSERT INTO `product_rubric` (`id`, `title`, `parent_id`, `is_root`) VALUES
(1, 'root', NULL, 1),
(2, 'Продовольственные', 1, 0),
(3, 'Фрукты', 2, 0),
(4, 'Непродовольственные', 1, 0),
(5, 'Бытовая химия', 4, 0),
(6, 'Одежда', 4, 0),
(8, 'Овощи', 2, 0),
(9, 'Турагенства', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tm_acl_role`
--
-- Создание: Дек 27 2011 г., 16:34
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
(1, 15, 1, 'show,show-attribute-hash,show-attribute-type,show-resource'),
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
(1, 86, 1, 'show,show-attribute-hash,show-attribute-type'),
(1, 87, 1, 'show'),
(1, 88, 1, 'show'),
(1, 89, 1, 'show'),
(1, 90, 1, 'show'),
(1, 91, 1, 'show'),
(1, 92, 1, 'show'),
(1, 93, 1, 'show'),
(1, 94, 1, 'show'),
(1, 95, 1, 'show'),
(1, 96, 1, 'show'),
(1, 97, 1, 'show'),
(1, 98, 1, 'show'),
(1, 99, 1, 'show'),
(1, 100, 1, 'show'),
(1, 101, 1, 'show'),
(1, 102, 1, 'show'),
(1, 103, 1, 'show'),
(1, 104, 1, 'show'),
(1, 105, 1, 'show'),
(1, 106, 1, 'show'),
(1, 107, 1, 'show'),
(1, 108, 1, 'show'),
(1, 109, 1, 'show'),
(1, 110, 1, 'show'),
(1, 111, 1, 'show'),
(1, 112, 1, 'show'),
(1, 113, 1, 'show'),
(1, 114, 1, 'show'),
(1, 115, 1, 'show'),
(1, 116, 1, 'show'),
(1, 117, 1, 'show'),
(1, 118, 1, 'show'),
(1, 119, 1, 'show'),
(1, 120, 1, 'show'),
(1, 121, 1, 'show'),
(1, 122, 1, 'show'),
(1, 123, 1, 'show'),
(1, 124, 1, 'show'),
(1, 125, 1, 'show'),
(1, 126, 1, 'show'),
(1, 127, 1, 'show'),
(1, 128, 1, 'show'),
(1, 129, 1, 'show'),
(1, 130, 1, 'show'),
(1, 131, 1, 'show'),
(1, 132, 1, 'show'),
(1, 133, 1, 'show'),
(1, 134, 1, 'show'),
(1, 135, 1, 'show,show-place'),
(1, 136, 1, 'show'),
(1, 137, 1, 'show'),
(1, 138, 1, 'show'),
(1, 139, 1, 'show'),
(1, 140, 1, 'show'),
(1, 141, 1, 'show'),
(1, 142, 1, 'show'),
(1, 143, 1, 'show'),
(1, 144, 1, 'show'),
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
(3, 76, 0, 'show'),
(3, 77, 0, 'show'),
(3, 78, 0, 'show'),
(3, 79, 0, 'show'),
(3, 80, 1, 'show'),
(3, 81, 1, 'show'),
(3, 82, 0, 'show'),
(3, 83, 0, 'show'),
(3, 84, 0, 'show'),
(3, 85, 1, 'show'),
(3, 86, 1, 'show'),
(3, 87, 0, 'show'),
(3, 88, 0, 'show'),
(3, 89, 0, 'show'),
(3, 90, 0, 'show'),
(3, 91, 0, 'show'),
(3, 92, 0, 'show'),
(3, 93, 0, 'show'),
(3, 94, 0, 'show'),
(3, 95, 0, 'show'),
(3, 96, 0, 'show'),
(3, 97, 0, 'show'),
(3, 98, 0, 'show'),
(3, 99, 0, 'show'),
(3, 100, 0, 'show'),
(3, 101, 1, 'show'),
(3, 102, 1, 'show'),
(3, 103, 1, 'show'),
(3, 104, 1, 'show'),
(3, 105, 1, 'show'),
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
(4, 76, 0, 'show'),
(4, 77, 0, 'show'),
(4, 78, 0, 'show'),
(4, 79, 0, 'show'),
(4, 80, 1, 'show'),
(4, 81, 1, 'show'),
(4, 82, 0, 'show'),
(4, 83, 1, 'show'),
(4, 84, 0, 'show'),
(4, 85, 1, 'show'),
(4, 86, 1, 'show'),
(4, 87, 1, 'show'),
(4, 88, 1, 'show'),
(4, 89, 1, 'show'),
(4, 90, 0, 'show'),
(4, 91, 0, 'show'),
(4, 92, 0, 'show'),
(4, 93, 0, 'show'),
(4, 94, 1, 'show'),
(4, 95, 1, 'show'),
(4, 96, 1, 'show'),
(4, 97, 0, 'show'),
(4, 98, 0, 'show'),
(4, 99, 0, 'show'),
(4, 100, 0, 'show'),
(4, 101, 1, 'show'),
(4, 102, 1, 'show'),
(4, 103, 1, 'show'),
(4, 104, 1, 'show'),
(4, 105, 1, 'show'),
(4, 106, 1, 'show'),
(4, 107, 1, 'show'),
(4, 108, 1, 'show'),
(4, 109, 1, 'show'),
(4, 110, 0, 'show'),
(4, 111, 0, 'show'),
(4, 112, 0, 'show'),
(4, 113, 0, 'show'),
(4, 114, 1, 'show'),
(4, 115, 1, 'show'),
(4, 116, 1, 'show'),
(4, 117, 0, 'show'),
(4, 118, 0, 'show'),
(4, 119, 0, 'show'),
(4, 120, 0, 'show'),
(4, 121, 0, 'show'),
(4, 122, 0, 'show'),
(4, 123, 0, 'show'),
(4, 124, 0, 'show'),
(4, 125, 1, 'show'),
(4, 126, 1, 'show'),
(4, 127, 1, 'show'),
(4, 128, 1, 'show'),
(4, 129, 1, 'show'),
(4, 130, 1, 'show'),
(4, 131, 1, 'show'),
(4, 132, 1, 'show'),
(4, 133, 1, 'show'),
(4, 134, 1, 'show'),
(4, 135, 0, 'show'),
(4, 136, 0, 'show'),
(4, 137, 0, 'show'),
(4, 138, 0, 'show'),
(4, 139, 0, 'show'),
(4, 140, 0, 'show'),
(4, 141, 0, 'show'),
(4, 142, 0, 'show'),
(4, 143, 0, 'show'),
(4, 144, 1, 'show'),
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
(5, 59, 0, 'show'),
(5, 67, 0, 'show'),
(5, 68, 0, 'show'),
(5, 69, 0, 'show'),
(5, 70, 0, 'show'),
(5, 71, 0, 'show'),
(5, 72, 0, 'show'),
(5, 76, 0, 'show'),
(5, 77, 0, 'show'),
(5, 78, 0, 'show'),
(5, 79, 0, 'show'),
(5, 80, 1, 'show'),
(5, 81, 1, 'show'),
(5, 82, 0, 'show'),
(5, 83, 0, 'show'),
(5, 84, 0, 'show'),
(5, 85, 1, 'show'),
(5, 86, 1, 'show'),
(5, 87, 0, 'show'),
(5, 88, 0, 'show'),
(5, 89, 0, 'show'),
(5, 90, 0, 'show'),
(5, 91, 0, 'show'),
(5, 92, 0, 'show'),
(5, 93, 0, 'show'),
(5, 94, 0, 'show'),
(5, 95, 0, 'show'),
(5, 96, 0, 'show'),
(5, 97, 0, 'show'),
(5, 98, 0, 'show'),
(5, 99, 0, 'show'),
(5, 100, 0, 'show'),
(5, 101, 1, 'show'),
(5, 102, 1, 'show'),
(5, 103, 1, 'show'),
(5, 104, 1, 'show'),
(5, 105, 1, 'show'),
(5, 106, 0, 'show'),
(5, 107, 0, 'show'),
(5, 108, 0, 'show'),
(5, 109, 0, 'show'),
(5, 110, 0, 'show'),
(5, 111, 0, 'show'),
(5, 112, 0, 'show'),
(5, 113, 0, 'show'),
(5, 114, 1, 'show'),
(5, 115, 1, 'show'),
(5, 116, 1, 'show'),
(5, 117, 0, 'show'),
(5, 118, 0, 'show'),
(5, 119, 0, 'show'),
(5, 120, 0, 'show'),
(5, 121, 0, 'show'),
(5, 122, 0, 'show'),
(5, 123, 0, 'show'),
(5, 124, 0, 'show'),
(5, 125, 0, 'show'),
(5, 126, 0, 'show'),
(5, 127, 0, 'show'),
(5, 128, 0, 'show'),
(5, 129, 1, 'show'),
(5, 130, 1, 'show'),
(5, 131, 1, 'show'),
(5, 132, 1, 'show'),
(5, 133, 0, 'show'),
(5, 134, 0, 'show'),
(5, 135, 0, 'show'),
(5, 136, 0, 'show'),
(5, 137, 0, 'show'),
(5, 138, 0, 'show'),
(5, 139, 0, 'show'),
(5, 140, 0, 'show'),
(5, 141, 0, 'show'),
(5, 142, 0, 'show'),
(5, 143, 0, 'show'),
(5, 144, 1, 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_task_attribute`
--
-- Создание: Дек 27 2011 г., 16:34
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

-- --------------------------------------------------------

--
-- Структура таблицы `tm_task_attribute_type`
--
-- Создание: Дек 27 2011 г., 16:34
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
-- Создание: Дек 27 2011 г., 16:34
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
-- Создание: Дек 27 2011 г., 16:34
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tm_user`
--

INSERT INTO `tm_user` (`id`, `login`, `password`, `role_id`, `date_create`) VALUES
(1, 'admin', '123', 1, '2011-11-16 16:26:00'),
(2, 'user', '321', 4, '2011-11-17 23:35:18'),
(6, 'user2', '333', 4, '2011-11-25 21:50:32'),
(7, 'moder', '654', 4, '2011-12-16 21:58:00'),
(8, 'Adidas', '111', 4, '2011-12-27 12:32:00'),
(9, 'mbg', '123456', 4, '2011-12-28 14:34:29');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_attribute`
--
-- Создание: Дек 27 2011 г., 16:34
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
(1, 'name', 1, 'Администратор', 1),
(2, 'name', 1, 'Первый пользователь', 1),
(6, 'name', 1, 'Второй пользователь', 1),
(7, 'name', 1, 'Модератор первой компании', 1),
(8, 'name', 1, 'Адик', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_attribute_type`
--
-- Создание: Дек 27 2011 г., 16:34
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
-- Создание: Дек 27 2011 г., 16:35
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
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `tm_user_profile`;
CREATE TABLE IF NOT EXISTS `tm_user_profile` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_key` varchar(255) NOT NULL,
  `profile_value` text NOT NULL,
  PRIMARY KEY (`user_id`,`profile_key`),
  KEY `fk_tm_user_profile_tm_user1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_resource`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `tm_user_resource`;
CREATE TABLE IF NOT EXISTS `tm_user_resource` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `rtitle` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=145 ;

--
-- Дамп данных таблицы `tm_user_resource`
--

INSERT INTO `tm_user_resource` (`id`, `title`, `rtitle`) VALUES
(1, 'login', ''),
(2, 'login/index', ''),
(3, 'login/logout', ''),
(4, 'index/index', ''),
(5, 'user', ''),
(6, 'user/add', ''),
(7, 'user/edit', ''),
(8, 'user/delete', ''),
(15, 'user/index', ''),
(19, 'user/addRole', ''),
(20, 'user/editRole', ''),
(21, 'user/deleteRole', ''),
(22, 'user/addResource', ''),
(23, 'user/editResource', ''),
(24, 'user/deleteResource', ''),
(25, 'user/fillResource', ''),
(59, 'user/showRoleAcl', ''),
(67, 'user/addAttributeType', ''),
(68, 'user/editAttributeType', ''),
(69, 'user/deleteAttributeType', ''),
(70, 'user/addAttributeHash', ''),
(71, 'user/editAttributeHash', ''),
(72, 'user/deleteAttributeHash', ''),
(76, 'city', 'Города'),
(77, 'city/index', ''),
(78, 'city/add', ''),
(79, 'city/edit', ''),
(80, 'company', ''),
(81, 'company/index', ''),
(82, 'company/add', ''),
(83, 'company/edit', ''),
(84, 'company/delete', ''),
(85, 'catalog', 'Каталог'),
(86, 'catalog/index', ''),
(87, 'company/viewAddress', ''),
(88, 'company/addAddress', ''),
(89, 'company/editAddress', ''),
(90, 'company/deleteAddress', ''),
(91, 'catalog/addRubric', 'Каталог/Добавить рубрику'),
(92, 'catalog/editRubric', ''),
(93, 'catalog/deleteRubric', ''),
(94, 'catalog/add', 'Каталог/Добавить товар'),
(95, 'catalog/edit', ''),
(96, 'catalog/delete', ''),
(97, 'user/viewAttributeType', 'Пользователи/Показать типы атрибутов'),
(98, 'user/viewResource', 'Пользователи/Показать ресурсы'),
(99, 'user/viewHash', 'Пользователи/Показать список атрибутов'),
(100, 'company/showAcl', 'Компания/Права пользователей'),
(101, 'about.html', 'О компании'),
(102, 'about/index', 'О компании/О компании'),
(103, 'company/view', 'Компания/Просмотреть'),
(104, 'actions/index', 'Акции/Акции'),
(105, 'actions/view', 'Акции/Просмотреть акцию'),
(106, 'company/viewGallery', 'Компании/Просмотреть галерею'),
(107, 'company/addGallery', 'Компания/Добавить фото'),
(108, 'company/editGallery', 'Компания/Редактировать фото'),
(109, 'company/deleteGallery', 'Компания/Удалить фото'),
(110, 'contentPage/index', 'Контентные страницы'),
(111, 'contentPage/add', 'Контентные страницы/Добавить'),
(112, 'contentPage/edit', 'Контентные страницы/Редактировать'),
(113, 'contentPage/delete', 'Контентные страницы/Удалить'),
(114, 'catalog/viewSubMenu', 'Каталог/Показать подменю'),
(115, 'index/chooseCity', 'Главная/Выбрать город'),
(116, 'catalog/viewProduct', 'Каталог/Показать продукт'),
(117, 'catalog/addAttributeHash', 'Каталог/Добавить атрибут'),
(118, 'catalog/editAttributeHash', 'Каталог/Редактировать атрибут'),
(119, 'catalog/deleteAttributeHash', 'Каталог/Удалить атрибут'),
(120, 'catalog/viewHash', 'Каталог/Список атрибутов'),
(121, 'catalog/viewAttributeType', 'Каталог/Типы атрибутов'),
(122, 'catalog/editAttributeType', 'Каталог/Редактировать тип атрибута'),
(123, 'catalog/addAttributeType', 'Каталог/Добавить тип атрибута'),
(124, 'catalog/delteAttributeType', 'Каталог/Удалить тип атрибута'),
(125, 'catalog/viewGallery', 'Каталог/Просмотреть галерею'),
(126, 'catalog/editGallery', 'Каталог/Редактировать фото'),
(127, 'catalog/deleteGallery', 'Каталог/Удалить фото'),
(128, 'catalog/addGallery', 'Каталог/Добавить фото'),
(129, 'catalog/reserve', 'Каталог/Отложить'),
(130, 'catalog/share', 'Каталог/Поделиться'),
(131, 'catalog/addComments', 'Каталог/Добавить комментарий'),
(132, 'catalog/viewComments', 'Каталог/Просмотреть комментарии'),
(133, 'catalog/editComments', 'Каталог/Редактировать комментарий'),
(134, 'catalog/deleteComments', 'Каталог/Удалить комментарий'),
(135, 'banner/index', 'Баннеры'),
(136, 'banner/viewPlace', 'Баннеры/Просмотреть площадки'),
(137, 'banner/add', 'Баннеры/Добавить баннер'),
(138, 'banner/edit', 'Баннеры/Редактировать баннер'),
(139, 'banner/delete', 'Баннеры/Удалить баннер'),
(140, 'banner/addPlace', 'Баннеры/Добавить площадку'),
(141, 'banner/editPlace', 'Баннеры/Редактировать площадку'),
(142, 'banner/deletePlace', 'Баннеры/Удалить площадку'),
(143, 'banner/placemark', 'Баннеры/Размещение'),
(144, 'search/index', 'Поиск');

-- --------------------------------------------------------

--
-- Структура таблицы `tm_user_role`
--
-- Создание: Дек 27 2011 г., 16:34
--

DROP TABLE IF EXISTS `tm_user_role`;
CREATE TABLE IF NOT EXISTS `tm_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `rtitle` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `tm_user_role`
--

INSERT INTO `tm_user_role` (`id`, `title`, `rtitle`) VALUES
(1, 'admin', 'Администратор'),
(3, 'customer', 'Покупатель'),
(4, 'companyadmin', 'Модератор'),
(5, 'guest', 'Гость');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `banner_place`
--
ALTER TABLE `banner_place`
  ADD CONSTRAINT `banner_place_ibfk_2` FOREIGN KEY (`bplace_id`) REFERENCES `bplace` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `banner_place_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `banner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments_product`
--
ALTER TABLE `comments_product`
  ADD CONSTRAINT `comments_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_product_ibfk_1` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `company_address`
--
ALTER TABLE `company_address`
  ADD CONSTRAINT `company_address_ibfk_4` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_address_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `company_user`
--
ALTER TABLE `company_user`
  ADD CONSTRAINT `company_user_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tm_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `tm_document_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tm_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallery_company`
--
ALTER TABLE `gallery_company`
  ADD CONSTRAINT `gallery_company_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tm_task_document_ibfk_2` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallery_product`
--
ALTER TABLE `gallery_product`
  ADD CONSTRAINT `gallery_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gallery_product_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_rubric_id`) REFERENCES `product_rubric` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD CONSTRAINT `product_attribute_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_attribute_ibfk_2` FOREIGN KEY (`attribute_key`) REFERENCES `product_hash` (`attribute_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_attribute_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `product_attribute_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_hash`
--
ALTER TABLE `product_hash`
  ADD CONSTRAINT `product_hash_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `product_attribute_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_rubric`
--
ALTER TABLE `product_rubric`
  ADD CONSTRAINT `fk_product_rubric_product_rubric` FOREIGN KEY (`parent_id`) REFERENCES `product_rubric` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
