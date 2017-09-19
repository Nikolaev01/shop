<?php
class SliderDB extends ObjectDB{
    protected static $table = "slider";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("title", "Validatetitle");
        $this->add("img", "ValidateIMG");
        $this->add("link", "ValidateURL");
    }
    protected function postInit() {
        $this->img = Config::DIR_IMG.$this->img;
        return true;
    }
    public static function getSlider(){
        return ObjectDB::getAllWithOrder(self::$table, __CLASS__);
    }

    /*public static function getBottomMenu(){
        // print_r(ObjectDB::getAllOnWhere(ObjectDB::getAllOnField(self::$table, __CLASS__, "type", false,"id")));
        return ObjectDB::getAllOnField(self::$table, __CLASS__, "type", false,"id");

    }*/
}

?>