<?php
    mb_internal_encoding("UTF-8");
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    set_include_path(get_include_path().PATH_SEPARATOR."core".PATH_SEPARATOR."lib".PATH_SEPARATOR."objects".PATH_SEPARATOR."validator".PATH_SEPARATOR."controllers".PATH_SEPARATOR."modules".PATH_SEPARATOR."modules/admin");
    spl_autoload_extensions("_class.php");
    spl_autoload_register();

    define("TOPMENU", 1);
    define("BOTTOMMENU", 2);
    define("KB_B", 1024);

    AbstractObjectDB::setDB(DataBase::getDBO());

?>