<?php
class MenuDB extends ObjectDB {
    protected static $table = "menu";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("title", "Validatetitle");
        $this->add("link", "ValidateURL");
        $this->add("parent_id", "ValidateID");
        $this->add("external", "Validateboolean");

    }

    public static function getTopMenu(){
        return ObjectDB::getAllWithOrder(self::$table, __CLASS__);
    }

    public static function getBottomMenu(){
       // print_r(ObjectDB::getAllOnWhere(ObjectDB::getAllOnField(self::$table, __CLASS__, "type", false,"id")));
        return ObjectDB::getAllOnField(self::$table, __CLASS__, "type", false,"id");

    }
}
?>