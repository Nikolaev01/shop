<?php
class Cart extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("cart_count");
        $this->add("cart_summa");
        $this->add("link_cart");
    }
    public function getTmplFile()
    {
        return "cart";
    }
}

?>