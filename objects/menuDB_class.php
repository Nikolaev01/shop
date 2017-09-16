<?php
class MenuDB extends ObjectDB {
    protected static $table = "menu"
    public function __construct()
    {
        parent::__construct(self::$table)
        $this->add("type", "ValidateID");
        $this->add("title", "Validatetitle");
        $this->add("link", "ValidateURL");
        $this->add("parent_id", "ValidateID");
        $this->add("external   ", "Validateboolean");
    }

    public static function getTopMenu(){
        return ObjectDB::getAllOnField(self::$table, __CLASS__, "type", TOPMENU, "id");

    }
    public static function getBottomMenu(){
        return ObjectDB::getAllOnField(self::$table, __CLASS__, "type", BOTTOMMENU, "id");

    }
}
?>