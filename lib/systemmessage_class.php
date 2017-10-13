<?php

class SystemMessage {
    public function __construct()
    {
        if (!session_id()) session_start();
    }

    public function messages($name, $result = false){
        if ($name == "UNKNOWN_ERROR") return $this->unknownError(true);
        $_SESSION["message"] = $name;
        return $result;
    }
    public function pageMessages($name, $result = false){
        $_SESSION["page_message"] = $name;
        return $result;
    }

    public function unknownError($page = false)
    {
        if ($page) $_SESSION["page_message"] = "UNKNOWN_ERROR";
        else $_SESSION["message"] = "UNKNOWN_ERROR";
        return false;
    }
}

?>