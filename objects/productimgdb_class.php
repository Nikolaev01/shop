<?php
class ProductImgDB extends ObjectDB{
    public static $table = "product_img";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("product_id", "ValidateID");
        $this->add("img", "ValidateImg");
        $this->add("alt", "Validatesmalltext");
    }
    protected function postInit()
    {
        $this->img = Config::DIR_IMG.$this->img;
        return true;
    }

    public static function getAllonProductID($product_id){
        $select = new Select(self::$db);
        $select->from(self::$table, "*")->where("`product_id`=".self::$db->getSQ(), array($product_id));
        $images = ObjectDB::buildMultiple(__CLASS__, self::$db->select($select));
        return $images;
    }


}