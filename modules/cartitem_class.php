<?php
class CartItem extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("cart_items", null, true);
        $this->add("page_name");
        $this->add("cart_summa");
        $this->add("link_cart");
    }
    public function getTmplFile()
    {
        return "cart_item";
    }
}

?>