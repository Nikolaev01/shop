<?php
class OrderPage extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("hornav");
        $this->add("delivery");
        $this->add("phone");
        $this->add("name");
        $this->add("email");
        $this->add("comment");
        $this->add("shipping");
        $this->add("punkt");
        $this->add("index");
        $this->add("addres");
        $this->add("comment");
        $this->add("price_discount");
        $this->add("discount");
        $this->add("action");
        $this->add("summa");
        $this->add("link_pageorder");
        $this->add("message");
    }
    public function getTmplFile()
    {
        return "orderpage";
    }



}

?>