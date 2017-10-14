<?php
class Manage {
    private $discount;
    private $product;
    private $orders;
    private $request;

    public function __construct()
    {
        session_start();
        $this->request = new Request();
        $this->data = $this->request->xss($_REQUEST);
        $this->discount = new DiscountDB();
        $this->product = new ProductDB();
        $this->orders = new OrderDB();
        $this->saveData();

    }

    private function saveData(){
        foreach ($this->data as $kea => $value) $_SESSION[$kea] = $value;
    }

    public function addCart($id = false){
        if($id == false)$id = $this->data["id"];
        if (!ObjectDB::existsID($id)) return false;
        if ($_SESSION["card"]) $_SESSION["card"] .= ",$id";
        else $_SESSION["card"] = $id;
    }
    public function delCart(){
        $id = $this->data["id"];
        $ids = explode(",", $_SESSION["card"]);
        $_SESSION["card"] = "";
        for ($i = 0; $i < count($ids); $i++){
            if($ids[$i] != $id) {
                $this->addCart($ids[$i]);
            }
        }
    }
    public function updateCart(){
        foreach ($_SESSION as $k => $v){
            if (strpos($k, "mont_") !== false){
                $_SESSION[$k] = "";
            }
        }
        $_SESSION["card"] = "";
        foreach ($this->data as $k => $v){
            if (strpos($k, "count_") !== false){
                $id = substr($k, strlen("count_"));
                for ($i = 0; $i < $v; $i++){
                    $this->addCart($id);
                }
            }
            if (strpos($k, "mont_") !== false){
                $this->saveData();
            }
            $_SESSION["discount"] = $this->data["promo"];
        }
        //print_r($_SESSION);

    }
    public function orderCart(){
        //выбираем какие продукты монтировать
        $product_ids_inst = "";
        foreach ($_SESSION as $k => $v){
            if (strpos($k, "mont_") !== false){
                $product_ids_inst .= substr($k, strlen("mont_")).",";
            }
        }
        $product_ids_inst = substr($product_ids_inst, 0, -1);
        $temp_data = array();
        $temp_data["delivery"] = $_SESSION["delivery"];
        $temp_data["product_ids"] = $_SESSION["card"];
        $temp_data["price"] = $this->getPrice();
        $temp_data["name"] = $this->data["name"];
        $temp_data["phone"] = $this->data["phone"];
        $temp_data["email"] = $this->data["email"];
        $temp_data["address"] = $this->data["addres"];
        if($_SESSION["delivery"] == "cur") $temp_data["address"] = $this->getFullAdress();
    elseif ($_SESSION["delivery"] == "sam") $temp_data["address"] = $this->data["punkt"];
        if (!isset($this->data["notice"])) $temp_data["notice"] = "";
    else $temp_data["notice"] = $this->data["notice"];
        $temp_data["date_order"] = Subsidiary::gt();
        $temp_data["date_send"] = 0;
        $temp_data["date_pay"] = 0;
        $temp_data["product_ids_inst"] = $product_ids_inst;
        //добавляем в базу
        if ($this->orders->addValues($temp_data)){


            
            $_SESSION["card"] = "";
            return true;
        }
        return false;
    }

    public function updateOrder(){

    }


    private function getPrice(){
        $ids = explode(",", $_SESSION["card"]);
        $summa = ProductDB::getPriceOnIDs($ids);
        if(!isset($_SESSION["discount"])) $value = false;
        else $value = $this->discount->getValueOnCode($_SESSION["discount"]);
        if ($value) $summa *= (1 - $value);
        return $summa;
    }

    private function getFullAdress(){
        return $this->data["country"].", ".$this->data["city"].", ".$this->data["addres"].", ".$this->data["index"];
    }

    public function getPlaceOnCoord($coord){
        $params = array(
            'coord' => $coord, // координаты
            'format'  => 'json',   // формат ответа
            'results' => 1 // количество выводимых результат
        );
        $response = json_decode(file_get_contents('https://geocode-maps.yandex.ru/1.x/?format=json&geocode=37.611,55.758'));
        print_r($response);
    }
}
?>