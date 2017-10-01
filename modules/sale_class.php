<?php
class Sale extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("sal", null, true);
        $this->add("link_product");
        $this->add("link_compare");
        $this->add("part_images");
        $this->add("link_addcart");
        $this->add("name");
    }
    public function getTmplFile()
    {
        return "sale";
    }

}


?>