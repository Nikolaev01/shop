<?php
class ProductOptionValueDB extends ObjectDB{
    public static $table = "product_option_value";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("product_option_value_id", "ValidateID");
        $this->add("product_id", "ValidateID");
        $this->add("option_id", "ValidateID");
        $this->add("option_value_id", "ValidateID");
    }

    public static function getTableName(){
        return self::$table;
    }



}