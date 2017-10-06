<?php
class Order extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("price_discount");
        $this->add("discount");
        $this->add("action");
        $this->add("summa");
    }
    public function getTmplFile()
    {
        return "order";
    }



}

?>