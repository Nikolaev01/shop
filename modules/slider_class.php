<?php
class Slider extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("uri");
        $this->add("slide", null, true);
    }

    public function getTmplFile()
    {
        return "slider";
    }



}
?>