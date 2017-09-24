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
}


?>