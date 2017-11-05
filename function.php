<?php
require_once "start.php";
$manage = new Manage();
$manageadmin = new ManageAdmin();
$func = $_REQUEST["func"];
if ($func == "add_card"){
    $manage->addCart();
}
elseif ($func == "del_card"){
    $manage->delCart();
}
elseif ($func == "cart"){
    $manage->updateCart();
}
elseif ($func == "order"){
    $success = $manage->orderCart();
}
elseif ($func == "getplace"){
    $manage->getPlaceOnCoord($param);
}
else exit;

if (isset($success)){
    if(!$success) $link = $_SERVER["HTTP_REFERER"];
    else $link = Config::ADDRESS.URL::get("", "", array());
}
else{
    if (!isset($_SERVER["HTTP_REFERER"])){
        $link = Config::ADDRESS.URL::get("", "", array());
    }
    else $link = $_SERVER["HTTP_REFERER"];
}
header("Location: $link");
exit;
?>