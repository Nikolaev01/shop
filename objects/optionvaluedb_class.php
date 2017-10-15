<?php
class OptionValueDB extends ObjectDB{
    public static $table = "option_value";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("option_value_id", "ValidateID");
        $this->add("option_id", "ValidateID");
        $this->add("name", "ValidateText");
    }

    public static function getTableName(){
        return self::$table;
    }



}