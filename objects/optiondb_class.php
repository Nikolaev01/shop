<?php
class OptionDB extends ObjectDB{
    public static $table = "option";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("option_id", "ValidateID");
        $this->add("option_name", "ValidateText");
        $this->add("type", "ValidateText");
    }

    public static function getTableName(){
        return self::$table;
    }



}