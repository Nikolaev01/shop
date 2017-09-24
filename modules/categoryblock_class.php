<?php
class CategoryBlock extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("category", null, true);
        $this->add("link_product");
        $this->add("link_compare");
        $this->add("part_images");
        $this->add("link_addcart");
    }
    public function getTmplFile()
    {
        return "category_block";
    }
}

?>