<?php
class CategoryDB extends ObjectDB{
    protected static $table = "categories";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("id", "ValidateID");
        $this->add("title", "Validatetitle");
        $this->add("img", "ValidateIMG");
        $this->add("section_id", "ValidateID");
        $this->add("description", "Validateboolean");
        $this->add("meta_desk", "ValidateMD");
        $this->add("meta_key", "ValidateMK");

    }

    protected function postInit()
    {
       $this->img = Config::DIR_IMG_CATEGORY.$this->img;
       $this->link = URL::get("category", "", array("id" => $this->id));
       //print_r($this->link);
       return true;
    }

    public static function getAll($count = false, $offset = false)
    {
        return parent::getAll($count, $offset);
    }


}
?>