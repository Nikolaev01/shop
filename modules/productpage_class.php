<?php
class ProductPage extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("products");
        $this->add("link_compare");
        $this->add("part_images");
        $this->add("link_addcart");
    }
    public function getTmplFile()
    {
        return "product_page";
    }

}
?>