<?php
class Geolacation {
    private $geocode;
    private $json;
    private $results;
    private $key;

    public static function getPlaceOnCoord($coord, $format, $result = 1){
        $params = array(
            'coord' => $coord, // координаты
            'format'  => $format,   // формат ответа
            'results' => $result // количество выводимых результатов
                                     // ваш api key
        );
        $response = json_decode(file_get_contents('https://geocode-maps.yandex.ru/1.x/?format=json&geocode=37.611,55.758'));
        print_r($response);
    }
}