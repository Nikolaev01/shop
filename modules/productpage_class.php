<?php
class ProductPage extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("products");
        $this->add("hornav");
        $this->add("images", null, true);
        $this->add("bues", null, true);
        $this->add("link_compare");
        $this->add("part_images");
        $this->add("link_addcart");
        $this->add("option");
    }


    public function getTmplFile()
    {
        return "product_page";
    }

}
?>