<?php
class ViewOrder extends Module{
    public function __construct()
    {
        parent::__construct();
        $this->add("item", null, true);
        $this->add("link_update");
        $this->add("link_delete");
        //$this->add("id");
        $this->add("delivery");
        $this->add("id");
        $this->add("product_ids");
        $this->add("price");
        $this->add("name");
        $this->add("phone");
        $this->add("email");
        $this->add("address");
        $this->add("notice");
        $this->add("date_order");
        $this->add("date_send");
        $this->add("date_pay");
        $this->add("product_ids_inst");
        $this->add("status");
    }
    public function getTmplFile()
    {
        return Config::ADMIN_DIR_TMPL."vieworder";
    }
}

?>