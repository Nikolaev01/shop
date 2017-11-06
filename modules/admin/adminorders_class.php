<?php
    class AdminOrders extends Module{
        public function __construct()
        {
            parent::__construct();
            $this->add("orders", null, true);
            $this->add("page_name");
            $this->add("cart_summa");
            $this->add("link_cart");
        }
        public function getTmplFile()
        {
            return Config::ADMIN_DIR_TMPL."orders";
        }
    }

?>