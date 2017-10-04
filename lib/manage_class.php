<?php
class Manage {
    private $config;
    private $validate;


    public function __construct()
    {
        session_start();
        $this->data = $_REQUEST;

    }
    public function addCart(){

        $id = $this->data["id"];
        if (!ObjectDB::existsID($id)) return false;
        if ($_SESSION["card"]) $_SESSION["card"] .= ",$id";
        else $_SESSION["card"] = $id;
    }
}
?>