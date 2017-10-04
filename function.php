<?php
    require_once "start.php";
    $manage = new Manage();
    $func = $_REQUEST["func"];
    if ($func == "add_card"){
        $manage->addCart();
    }
    else exit;
    if (!isset($_SERVER["HTTP_REFERER"])){
        $link = Config::ADDRESS.URL::get("", "", array());
    }
    else $link = $_SERVER["HTTP_REFERER"];
    header("Location: $link");
    exit;
?>