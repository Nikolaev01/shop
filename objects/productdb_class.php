<?php

class ProductDB extends ObjectDB{
    protected static $table = "product";

    public function __construct()
    {
        parent::__construct(self::$table);
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

    protected function postInit()
    {

    }

    public function getAllShow($count = false, $offset = false, $post_handling = false){
        $select
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