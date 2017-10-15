<?php
class OptionProduct extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("item", null, true);
        $this->add("discount");
    }
    public function getTmplFile()
    {
        return "option_product";
    }


}
?>