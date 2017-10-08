<?php
class Manage {
    private $config;
    private $validate;


    public function __construct()
    {
        session_start();
        $this->data = $_REQUEST;
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
        $_SESSION["card"] = "";
        foreach ($this->data as $k => $v){
            if (strpos($k, "count_") !== false){
                $id = substr($k, strlen("count_"));
                for ($i = 0; $i < $v; $i++){
                    $this->addCart($id);
                }
            }
           $_SESSION["discount"] = $this->data["promo"];
        }
    }
    public function orderCart(){
        //print_r($this->data);
    }
    public function getPlaceOnCoord($coord){
        $params = array(
            'coord' => $coord, // координаты
            'format'  => 'json',   // формат ответа
            'results' => 1 // количество выводимых результатов
            // ваш api key
        );
        $response = json_decode(file_get_contents('https://geocode-maps.yandex.ru/1.x/?format=json&geocode=37.611,55.758'));
        print_r($response);
    }
}
?>