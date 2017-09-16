<?php
//Класс выводящий сообщения пользователю
class Message{
    private $data;
    //Превращаем INI файл в асоциативный массив
    public function __construct($file)
    {
        $this->data = parse_ini_file($file);
    }

    public function get ($name)
    {
        return $this->data[$name];
    }
}
?>