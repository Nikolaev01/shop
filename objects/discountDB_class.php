<?php
class DiscountDB extends ObjectDB{
    protected static $table = "discount";
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("id", "ValidateID");
        $this->add("code", "Validatetitle");
        $this->add("value", "Validatetitle");


    }

    public function getValueOnCode($code)
    {
        //print_r($code);
       return $this->getField("code", $code, "value");
    }


}
?>