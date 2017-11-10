<?php
class OrderDB extends ObjectDB{
    protected static $table = "orders";
    protected $check;
    protected $message;
    protected $mail;
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
        $this->add("status", "ValidateText");
        $this->check = new Check();
        $this->mail = new Mail();
    }

    protected function checkData($data){
        //if (!$this->check->oneOrZero($data["delivery"])) return "ERROR_DELIVERY";
        if (!$this->check->ids($data["product_ids"])) return "UNKNOWN_ERROR";
        if (!$this->check->amount($data["price"])) return "ERROR_PRICE";
        if (!$this->check->name($data["name"])) return "ERROR_NAME";
        //if (!$this->check->title($data["phone"])) return "ERROR_PHONE";
        if (!$this->check->email($data["email"])) return "ERROR_EMAIL";
        if ($data["delivery"] == "sam") $empty = true;
        else $empty = false;
        if (!$this->check->text($data["address"], $empty)) return "ERROR_ADDRESS";
        if (!$this->check->text($data["notice"], true)) return "ERROR_NOTICE";
        if (!$this->check->ts($data["date_order"])) return "UNKNOWN_ERROR";
        if (!$this->check->ts($data["date_send"])) return "UNKNOWN_ERROR";
        if (!$this->check->ts($data["date_pay"])) return "UNKNOWN_ERROR";
        return true;
    }

    protected function check($value){
        $result = $this->checkData($value);
        if($result === true) return true;
        $sm = new SystemMessage();
        return $sm->messages($result);
    }



    public function addValues($values){
        if(!$this->check($values)) return false;
        return self::$db->insert(self::$table, $values);
    }

    public static function deleteRow($id){
        if (!$id)return false;
        $query = "DELETE FROM `".Config::DB_PREFIX.self::$table."` 
	WHERE `id` = ".$id;
        $result = self::$db->deleteRow($query);
        return $result;
    }

}