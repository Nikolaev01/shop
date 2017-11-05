<?php
require_once "start.php";
$manage = new ManageAdmin();
$auth = new Auth();
$func = $_REQUEST["func"];
$link = "";
if ($func == "authAdmin"){
    $manage->auth();
}

elseif (!$auth->checkAdmin($_SESSION["login"], $_SESSION["password"])){
   header("Location: ".URL::get("auth", "admin", array()));
   exit;
}

else{
    if ($func == "logout"){
        $manage->logout();
    }
    else exit;
}
if (!$link) $link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: URL::get("", "", array());
header("Location: $link");
exit;
?>