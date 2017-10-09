<?php
class OrderDB extends ObjectDB{
    protected static $table = "orders";
    protected $validate;
    protected $message;
    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("id", "ValidateID");
        $this->add("delivery", "ValidateName");
        $this->add("product_ids", "ValidateIds");
        $this->add("price", "ValidateName");
        $this->add("name", "ValidateName");
        $this->add("phone", "ValidateText");
        $this->add("email", "ValidateEmail");
        $this->add("address", "ValidateSmallText");
        $this->add("notice", "ValidateText");
        $this->add("date_order", "ValidateDate");
        $this->add("date_send", "ValidateDate");
        $this->add("date_pay", "ValidateDate");
        $this->add("product_ids_inst", "ValidateIds");
        //$this->validate = new JSValidator($this->__construct($this->message));
    }

    protected function checkData($data){

        //if(!$this->validate->email($data["email"])) return "ERROR_EMAIL";
        return true;
    }


    public function addValues($values){
        return self::$db->insert(self::$table, $values);
    }


}