<?php
class Product extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("product", null, true);
        $this->add("link_compare");
        $this->add("part_images");
        $this->add("link_addcart");
        $this->add("pagination");
    }
    public function getTmplFile()
    {
        return "product";
    }

}





?>