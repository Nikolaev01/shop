<?php
class Hits extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("hit", null, true);
        $this->add("link_product");
        $this->add("link_compare");
        $this->add("part_images");
        $this->add("link_addcart");
    }
    public function getTmplFile()
    {
        return "hits";
    }



}


?>