<?php

class ProductDB extends ObjectDB{
    protected static $table = "product";

    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("id", "ValidateID");
        $this->add("category_id", "ValidateID");
        $this->add("title", "ValidateTitle");
        $this->add("meta_desc", "ValidateMD");
        $this->add("meta_key", "ValidateMK");
        $this->add("price", "ValidateName");
        $this->add("code", "ValidateName");
        $this->add("customer", "ValidateName");
        $this->add("serial", "ValidateName");
        $this->add("model", "ValidateName");
        $this->add("contry", "ValidateName");
        $this->add("description", "ValidateName");
        $this->add("composition", "ValidateName");
    }

    protected function postInit() {
        $this->img = Config::DIR_IMG.$this->img;
        $product_img = new ProductImgDB();
        $product_img->load($this->id);
        $this->product_img = $product_img;
        return true;
    }
    public static function getAllTable() {
        return ObjectDB::getAll();
    }
    public static function getAllWithImg(){

    }


    /*public static function getImgOnProductID($productID){
        $img = ProductImgDB::getAllOnField(ProductImgDB::$table, __CLASS_, "product_id", $productID);
        return $img;
    }*/


    public function getAllShow($count = false, $offset = false, $post_handling = false){

    }

    private static function getBaseSelect(){
        $select = new Select(self::$db);
        $select->from(self::$table, "*");
        return $select;
    }

    public static function getAllOnHits(){

    }
}


?>