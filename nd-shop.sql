-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 18 2017 г., 00:29
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
(1, 'Полотенцесушители', 'polotencesych.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(2, 'Смесители', 'smesiteli.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(3, 'Сифоны', 'sifon.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(4, 'Фильтры для воды', 'filter.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(5, 'Сопутствующие товары', 'soput.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(6, 'Системы контроля протечки', 'control.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(7, 'Раковины', 'rakovin.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(8, 'Кухонные мойки', 'moiki.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова'),
(9, 'Унитазы', 'unitaz.jpg', 0, 0, 'Здесь описание категории', 'Здесь ключевое описание', 'Здесь ключевые слова');

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
(2, 1, 'Контакты', '/contact.html', NULL, 0),
(3, 1, 'Оплата', '/pay.html', NULL, 0),
(4, 1, 'Доставка', '/delivery.html', NULL, 0),
(5, 1, 'Услуги', '/services.html', NULL, 0),
(6, 1, 'О компании', '/company.html', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_option`
--

CREATE TABLE `xcv_option` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_option_value`
--

CREATE TABLE `xcv_option_value` (
  `option_value_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
  `code` varchar(50) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `contry` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `composition` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_product_option`
--

CREATE TABLE `xcv_product_option` (
  `product_option_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `option_value` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xcv_product_option_value`
--

CREATE TABLE `xcv_product_option_value` (
  `product_option_value_id` int(11) UNSIGNED NOT NULL,
  `product_option_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `option_value_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
-- Индексы таблицы `xcv_product_option`
--
ALTER TABLE `xcv_product_option`
  ADD PRIMARY KEY (`product_option_id`);

--
-- Индексы таблицы `xcv_product_option_value`
--
ALTER TABLE `xcv_product_option_value`
  ADD PRIMARY KEY (`product_option_value_id`,`product_option_id`);

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
-- AUTO_INCREMENT для таблицы `xcv_menu`
--
ALTER TABLE `xcv_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `xcv_option`
--
ALTER TABLE `xcv_option`
  MODIFY `option_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_option_value`
--
ALTER TABLE `xcv_option_value`
  MODIFY `option_value_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_product`
--
ALTER TABLE `xcv_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_product_img`
--
ALTER TABLE `xcv_product_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_product_option`
--
ALTER TABLE `xcv_product_option`
  MODIFY `product_option_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_product_option_value`
--
ALTER TABLE `xcv_product_option_value`
  MODIFY `product_option_value_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_slider`
--
ALTER TABLE `xcv_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `xcv_user`
--
ALTER TABLE `xcv_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
