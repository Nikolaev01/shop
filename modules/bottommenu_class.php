<?php
class BottomMenu extends TopMenu
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTmplFile()
    {
        return "bottommenu";
    }
}

?>