<?php
class URLPage extends URL {
    public function getProduct($product_id){
        return $this->returnURL("product?id=$product_id");
    }

    protected function returnURL($url, $index = false) {
        if (!$index) $index = Config::ADDRESS;
        if ($url == "") return $index;
        if (strpos($url, $index) !== 0) $url = $index.$url;
        $url = str_replace("&", "&amp;", $url);
        return $url;
    }

    public static function getOrderPage(){
        return URL::get("order", "", array());
    }
    public static function getLinkAddCart($product_id){
        return URL::get(Config::FILE_FUNC, "", array("func" => "add_card","id" => $product_id));
    }
    public static function getLinkDelCart($product_id){
        return URL::get(Config::FILE_FUNC, "", array("func" => "del_card","id" => $product_id));
    }

    public static function getLinkAddCompare($product_id){
        return URL::get(Config::FILE_FUNC, "", array("func" => "add_compare","id" => $product_id));
    }
     public static function action(){
        return URL::get(Config::FILE_FUNC, "", array());
    }
    public static function message(){
        return URL::get("message", "", array());
    }



}


?>