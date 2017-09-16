<?php

abstract class Validator {

    const CODE_UNKNOWN = "UNKNOWN_ERROR";

    protected $data;
    private $errors = array();

    public function __construct()
    {
        $this->data = $data;
        $this->validate();
    }
    //Реализуем проверку для каждого доернего класса
    abstract protected function validate();

    public function getErrors(){
        return $this->errors;
    }
    //Количество значений с нулем
    public function isValid(){
        return count($this->errors) == 0;
    }
    //Добавление кода ошибки в массив ERRORS
    protected function setError($code){
        $this->errors[] = $code;
    }

    protected function isContainQuotes($string) {
        $array = array("\"", "'", "`", "&quot;", "&apos;");
        foreach ($array as $key => $value) {
            if (strpos($string, $value) !== false) return true;
        }
        return false;
    }

}


?>