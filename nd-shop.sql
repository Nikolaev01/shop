-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 16 2017 г., 00:12
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nd-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_categories`
--

CREATE TABLE `xcv_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `meta_desk` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_categories`
--

INSERT INTO `xcv_categories` (`id`, `title`, `img`, `section_id`, `parent_id`, `description`, `meta_desk`, `meta_key`) VALUES
(1, 'Полотенцесушители', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(2, 'Смесители', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(3, 'Сифоны', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(4, 'Фильтры для воды', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(5, 'Сопутствующие товары', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(6, 'Системы контроля протечки', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(7, 'Раковины', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(8, 'Кухонные мойки', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(9, 'Унитазы', 'category_img.png', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_discount`
--

CREATE TABLE `xcv_discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_discount`
--

INSERT INTO `xcv_discount` (`id`, `code`, `value`) VALUES
(1, 'qwertyuiop', '0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_menu`
--

CREATE TABLE `xcv_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `external` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_menu`
--

INSERT INTO `xcv_menu` (`id`, `type`, `title`, `link`, `parent_id`, `external`) VALUES
(1, 1, 'Главная', '/', NULL, 0),
(2, 1, 'Контакты', '/contact', NULL, 0),
(3, 1, 'Оплата', '/pay', NULL, 0),
(4, 1, 'Доставка', '/delivery', NULL, 0),
(5, 1, 'Услуги', '/services', NULL, 0),
(6, 1, 'Каталог', '/category', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_option`
--

CREATE TABLE `xcv_option` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_option`
--

INSERT INTO `xcv_option` (`option_id`, `option_name`, `type`) VALUES
(1, 'Артикул', ''),
(2, 'Тип', ''),
(3, 'Управление', ''),
(4, 'Вид', ''),
(5, 'Высота поддона, см', ''),
(6, 'Материал', ''),
(7, 'Ширина, см', ''),
(8, 'Глубина, см', ''),
(9, 'Высота, см', '');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_option_value`
--

CREATE TABLE `xcv_option_value` (
  `option_value_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `xcv_option_value`
--

INSERT INTO `xcv_option_value` (`option_value_id`, `option_id`, `name`) VALUES
(1, 2, 'Неразьемный'),
(2, 2, 'Разьемный'),
(3, 3, 'Ручное'),
(4, 3, 'Автоматическое'),
(5, 4, 'Средний'),
(6, 4, 'Малый'),
(7, 4, 'Большой'),
(8, 4, 'Огромный');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_orders`
--

CREATE TABLE `xcv_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `notice` text NOT NULL,
  `date_order` int(11) UNSIGNED NOT NULL,
  `date_send` int(11) NOT NULL,
  `date_pay` int(11) NOT NULL,
  `product_ids_inst` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not_confirm'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_orders`
--

INSERT INTO `xcv_orders` (`id`, `delivery`, `product_ids`, `price`, `name`, `phone`, `email`, `address`, `notice`, `date_order`, `date_send`, `date_pay`, `product_ids_inst`, `status`) VALUES
(127, 'sam', '14,14,14,14,14', 9045, 'николай', '+7 (926) 022-2222', 'yungkiller@yandex.ru', 'olimp', '', 1508095877, 0, 0, '', 'not_confirm'),
(126, 'cur', '2', 2010, 'Николай Николаев', '+7 (496) 754-5850', 'w5yw54y5yw@hdrtjh.ru', 'Россия, Москва, 54y4y54y45yy45y45y4, 54y54y54y45y5', '', 1508014495, 0, 0, '', 'not_confirm'),
(125, 'cur', '2', 2010, 'Николай Николаев', '+7 (496) 754-5850', 'w5yw54y5yw@hdrtjh.ru', 'Россия, Подольск, 54y4y54y45yy45y45y4, 54y54y54y45y5', '', 1508014453, 0, 0, '', 'not_confirm'),
(124, 'sam', '2,2,3', 6030, 'Николай Николаев', '+7 (496) 754-5850', '32534t5@ya.et', 'olimp', '', 1508014348, 0, 0, '', 'not_confirm'),
(123, 'sam', '18,18,18,18,18,18,18,35,35,35,35,38,38,38,38', 27135, 'Николай Николаев', '+7 (496) 754-5850', 'yungkiller@yandex.ru', 'olimp', '', 1508014203, 0, 0, '', 'not_confirm'),
(122, 'sam', '1,1,1,2,2,2,2,9,9,9,9,9,9', 20130, 'Николай Николаев', '+7 (496) 754-5850', 'yungkiller@yandex.ru', 'prt_mir', '', 1508013998, 0, 0, '1,2', 'not_confirm'),
(121, 'sam', '2,2,2,2,2,2,2,2,2,6,6,6', 168791, 'Николай Николаев', '+7 (496) 754-5850', 'yungkiller@yandex.ru', 'prt_mir', '', 1508013918, 0, 0, '2', 'not_confirm'),
(120, 'sam', '1,1,1,1,1,1,1,2,2,2,2,3', 9108, 'Николай Николаев', '+7 (496) 754-5850', 'yungkiller@yandex.ru', 'prt_mir', '', 1508013669, 0, 0, '1,2,3', 'not_confirm'),
(118, 'sam', '1,2,3', 4030, 't5234t', '+7 (357) 356-7356', '356735673@ahsrthn.ru', 'olimp', '', 1508012963, 0, 0, '', 'not_confirm'),
(119, 'sam', '1,2,3', 4030, 't5234t', '+7 (357) 356-7356', '356735673@ahsrthn.ru', 'olimp', '', 1508013034, 0, 0, '', 'not_confirm');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_product`
--

CREATE TABLE `xcv_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `inst_price` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `contry` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `sold` int(11) NOT NULL,
  `discount` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_product`
--

INSERT INTO `xcv_product` (`id`, `category_id`, `title`, `meta_desc`, `meta_key`, `price`, `inst_price`, `code`, `customer`, `serial`, `model`, `contry`, `description`, `composition`, `sold`, `discount`) VALUES
(1, 1, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 10, 1000, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(2, 2, 'Душевая кабина Esbaro Led ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 1000, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 235, 0),
(3, 3, 'Душевая кабина E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 1000, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 555, 0),
(4, 4, 'Душевая кабина Esbaro Led E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 1000, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 945, 0),
(5, 5, 'Душевая ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 1000, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 387, 0),
(6, 6, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 56485, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 983, 0),
(7, 7, 'Душевая кабина Esbaro ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 66, 0),
(8, 8, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 10, 0),
(9, 9, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(10, 1, 'Душевая кабина Esbaro Led ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 235, 0),
(11, 2, 'Душевая кабина E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 555, 0),
(12, 3, 'Душевая кабина Esbaro Led E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 945, 0),
(13, 4, 'Душевая ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 387, 0),
(14, 5, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 983, 0),
(15, 6, 'Душевая кабина Esbaro ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 66, 0),
(16, 7, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 10, 0),
(17, 8, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(18, 9, 'Душевая кабина Esbaro Led ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 235, 0),
(19, 1, 'Душевая кабина E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 555, 0),
(20, 2, 'Душевая кабина Esbaro Led E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 945, 0),
(21, 3, 'Душевая ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 387, 0),
(22, 4, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 983, 0),
(23, 5, 'Душевая кабина Esbaro ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 66, 0),
(24, 6, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 10, 0),
(25, 7, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(26, 8, 'Душевая кабина Esbaro Led ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 11, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 235, 0),
(27, 9, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(28, 8, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 10, 0),
(29, 9, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(30, 1, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0),
(31, 2, 'Душевая кабина Esbaro Led ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 235, 0),
(32, 3, 'Душевая кабина E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 555, 0),
(33, 4, 'Душевая кабина Esbaro Led E', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 945, 0),
(34, 5, 'Душевая ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 387, 0),
(35, 6, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 983, 0),
(36, 7, 'Душевая кабина Esbaro ', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 66, 0),
(37, 8, 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 10, 0),
(38, 9, 'Душевая кабина Esbaro Led ES-L100', 'Душевая кабина Esbaro Led ES-L100CR', 'Душевая кабина Esbaro Led ES-L100CR', 2010, 0, '312126', 'Fsbana', 'Led', 'Led FS-I-100CR', 'Испания', '', 'Душевая кабина - 1 шт.\r\nДушевой гарнитур - 1 шт.\r\nПолка - 1 шт.\r\nСифон - 1 шт.\r\nИнструкция - 1 шт.', 786, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_product_img`
--

CREATE TABLE `xcv_product_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(50) NOT NULL,
  `alt` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `xcv_product_img`
--

INSERT INTO `xcv_product_img` (`id`, `product_id`, `img`, `alt`) VALUES
(1, 1, 'product_big_img.png', 'Душевая кабина'),
(2, 2, 'product_big_img.png', 'Продукт'),
(3, 3, 'product_big_img.png', 'gaseghseht'),
(4, 4, 'product_big_img.png', '123'),
(5, 5, 'product_big_img.png', '123'),
(6, 6, 'product_big_img.png', '346346'),
(7, 7, 'product_big_img.png', '345'),
(8, 1, 'product.png', 'sdfaw'),
(9, 8, 'product_big_img.png', 'Душевая кабина'),
(10, 9, 'product_big_img.png', 'Продукт'),
(11, 10, 'product_big_img.png', 'gaseghseht'),
(12, 11, 'product_big_img.png', '123'),
(13, 12, 'product_big_img.png', '123'),
(14, 13, 'product_big_img.png', '346346'),
(15, 14, 'product_big_img.png', '345'),
(16, 15, 'product_big_img.png', 'Душевая кабина'),
(17, 16, 'product_big_img.png', 'Продукт'),
(18, 17, 'product_big_img.png', 'gaseghseht'),
(19, 18, 'product_big_img.png', '123'),
(20, 19, 'product_big_img.png', '123'),
(21, 20, 'product_big_img.png', '346346'),
(22, 21, 'product_big_img.png', '345'),
(23, 1, 'product_big_img.png', 'Душевая кабина'),
(24, 2, 'product_big_img.png', 'Продукт'),
(25, 3, 'product_big_img.png', 'gaseghseht'),
(26, 4, 'product_big_img.png', '123'),
(27, 5, 'product_big_img.png', '123'),
(28, 6, 'product_big_img.png', '346346'),
(29, 7, 'product_big_img.png', '345'),
(30, 1, 'product.png', 'sdfaw'),
(31, 8, 'product_big_img.png', 'Душевая кабина'),
(32, 9, 'product_big_img.png', 'Продукт'),
(33, 10, 'product_big_img.png', 'gaseghseht'),
(34, 11, 'product_big_img.png', '123'),
(35, 12, 'product_big_img.png', '123'),
(36, 13, 'product_big_img.png', '346346'),
(37, 14, 'product_big_img.png', '345'),
(38, 15, 'product_big_img.png', 'Душевая кабина'),
(39, 16, 'product_big_img.png', 'Продукт'),
(40, 17, 'product_big_img.png', 'gaseghseht'),
(41, 18, 'product_big_img.png', '123'),
(42, 19, 'product_big_img.png', '123'),
(43, 20, 'product_big_img.png', '346346'),
(44, 21, 'product_big_img.png', '345'),
(45, 29, 'product_big_img.png', 'Душевая кабина'),
(46, 22, 'product_big_img.png', 'Продукт'),
(47, 23, 'product_big_img.png', 'gaseghseht'),
(48, 24, 'product_big_img.png', '123'),
(49, 25, 'product_big_img.png', '123'),
(50, 26, 'product.png', '346346'),
(51, 27, 'product_big_img.png', '345'),
(52, 28, 'product.png', 'sdfaw'),
(53, 30, 'product_big_img.png', 'Душевая кабина'),
(54, 31, 'product_big_img.png', 'Продукт'),
(55, 32, 'product_big_img.png', 'gaseghseht'),
(56, 33, 'product_big_img.png', '123'),
(57, 34, 'product_big_img.png', '123'),
(58, 35, 'product_big_img.png', '346346'),
(59, 36, 'product_big_img.png', '345'),
(60, 28, 'product_big_img.png', '123'),
(61, 30, 'product_big_img.png', '123'),
(62, 31, 'product_big_img.png', '346346'),
(63, 32, 'product_big_img.png', '345'),
(64, 33, 'product_big_img.png', 'Душевая кабина'),
(65, 34, 'product_big_img.png', 'Продукт'),
(66, 35, 'product_big_img.png', 'gaseghseht'),
(67, 36, 'product_big_img.png', '123'),
(68, 37, 'product_big_img.png', '123'),
(69, 38, 'product_big_img.png', '346346'),
(70, 27, 'product_big_img.png', 'gaseghseht'),
(71, 29, 'product_big_img.png', '123'),
(72, 30, 'product_big_img.png', '123'),
(73, 31, 'product_big_img.png', '346346'),
(74, 30, 'product_big_img.png', '346346'),
(75, 30, 'product_big_img.png', '346346'),
(76, 30, 'product_big_img.png', '3468648645'),
(77, 30, 'product.png', 'Картинка');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_product_option_value`
--

CREATE TABLE `xcv_product_option_value` (
  `product_option_value_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `option_value_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `xcv_product_option_value`
--

INSERT INTO `xcv_product_option_value` (`product_option_value_id`, `product_id`, `option_id`, `option_value_id`) VALUES
(1, 2, 2, 1),
(2, 2, 2, 1),
(3, 2, 3, 3),
(4, 2, 3, 3),
(5, 1, 3, 3),
(6, 1, 2, 2),
(7, 3, 3, 3),
(8, 3, 2, 2),
(9, 2, 4, 7),
(10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_slider`
--

CREATE TABLE `xcv_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xcv_slider`
--

INSERT INTO `xcv_slider` (`id`, `title`, `img`, `link`) VALUES
(1, 'Акция', 'slider_img.png', '?action&id=1'),
(2, 'Акция', 'action_img.png', '?action&id=2'),
(3, 'Акция', 'slider_img.png', '?action&id=3'),
(4, 'Акция', 'action_img.png', '?action&id=4');

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_user`
--

CREATE TABLE `xcv_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `xcv_categories`
--
ALTER TABLE `xcv_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xcv_discount`
--
ALTER TABLE `xcv_discount`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xcv_menu`
--
ALTER TABLE `xcv_menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xcv_option`
--
ALTER TABLE `xcv_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Индексы таблицы `xcv_option_value`
--
ALTER TABLE `xcv_option_value`
  ADD PRIMARY KEY (`option_value_id`);

--
-- Индексы таблицы `xcv_orders`
--
ALTER TABLE `xcv_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xcv_product`
--
ALTER TABLE `xcv_product`
  ADD PRIMARY KEY (`category_id`,`id`);

--
-- Индексы таблицы `xcv_product_img`
--
ALTER TABLE `xcv_product_img`
  ADD PRIMARY KEY (`id`,`product_id`);

--
-- Индексы таблицы `xcv_product_option_value`
--
ALTER TABLE `xcv_product_option_value`
  ADD PRIMARY KEY (`product_option_value_id`);

--
-- Индексы таблицы `xcv_slider`
--
ALTER TABLE `xcv_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xcv_user`
--
ALTER TABLE `xcv_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `xcv_categories`
--
ALTER TABLE `xcv_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `xcv_discount`
--
ALTER TABLE `xcv_discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `xcv_menu`
--
ALTER TABLE `xcv_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `xcv_option`
--
ALTER TABLE `xcv_option`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `xcv_option_value`
--
ALTER TABLE `xcv_option_value`
  MODIFY `option_value_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `xcv_orders`
--
ALTER TABLE `xcv_orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT для таблицы `xcv_product`
--
ALTER TABLE `xcv_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_product_img`
--
ALTER TABLE `xcv_product_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT для таблицы `xcv_product_option_value`
--
ALTER TABLE `xcv_product_option_value`
  MODIFY `product_option_value_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `xcv_slider`
--
ALTER TABLE `xcv_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `xcv_user`
--
ALTER TABLE `xcv_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
