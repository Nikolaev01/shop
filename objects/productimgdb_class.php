<?php
class ProductImgDB extends ObjectDB{
    protected static $table = "product_img";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("productt_id", "ValidateID");
        $this->add("img", "ValidateImg");
        $this->add("alt", "Validatesmalltext");
    }
    protected function postInit()
    {
        $this->img = Config::DIR_IMG.$this->img;
        return true;
    }




}