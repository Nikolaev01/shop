<?php
abstract class Config {

    const SITENAME = "nd-shop.ru";
    const SECRET = "SACSDV";
    const ADDRESS = "http://nd-shop.ru";
    const ADM_NAME = "Николаев Николай";
    const ADM_EMAIL = "nikolaevnv50@yandex.ru";


    const DB_HOST = "localhost";//Название хоста
    const DB_USER = "root";//Название пользователя БД
    const DB_PASSWORD = "";//Пароль БД
    const DB_NAME = "nd-shop";//Название базы данных
    const DB_PREFIX = "xcv_";//Префикс таблицы
    const DB_SYM_QUERY = "?";

    const DIR_IMG = "/images/";
    const DIR_IMG_PRODUCT = "/images/product/";
    const DIR_IMG_ARTICLE = "/images/article/";//Директория с изображениями
    const DIR_IMG_CATEGORY = "/images/category/";//Директория с изображениями категорий

    const DIR_IMG_AVATAR = "/images/avatar/";//Директория с аватарками
    const DIR_TMPL = "/tmpl/";//директория с файлами шаблна
    const DIR_EMAILS = "/tmpl/emails/";//Файлы с e-mail сообщениями

    const LAYOUT = "main";//название общего шаблона

    const FILE_FUNC = "function.php";//файл с обработкой функций на сайте

    const FILE_MESSAGES = "/text/messages.ini";//путь к файлу с системными сообщениями

    const FORMAT_DATE = "%d.%m.%Y %H:%M:%S";//Формат даты

    const COUNT_ARTICLES_ON_PAGE = 9;//количество ст на ст
    const COUNT_SHOW_PAGES = 10;//количество выводимых страниц

    const MIN_SEARCH_LEN = 3;//Минимальная длина слова в поиске
    const LEN_SEARCH_RES = 255;//Максимальная длина слова в поиске

    const DEFAULT_AVATAR = "default.png";//файл стандартной аватарки
    const MAX_SIZE_AVATAR = 51200;//максимальный размер аватарки
    const SEF_SUFFIX = ".html";
}
?>