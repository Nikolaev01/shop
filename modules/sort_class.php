<?php
class Sort extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("link_sale");
        $this->add("link_price");
        $this->add("link_down");
        $this->add("link_up");
        $this->add("category_name");
        $this->add("request");
        $this->add("request_up");
    }

    public function getTmplFile()
    {
        return "sort";
    }

}