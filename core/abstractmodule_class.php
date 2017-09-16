<?php
//Класс для работы с модулями
abstract class AbstractModule {
    private $properties = array();//свойства
    private $view;//представление объект шаблонизатора
    public function __construct($view)
    {
        $this->view = $view;
    }
    //Метод по добавлению нового свойства для модуля
    final protected function add($name, $default = null, $is_array = false){
        $this->properties[$name]["is_array"] = $is_array;
        if ($is_array && $default == null) $this->properties[$name]["value"] = array();
        else $this->properties[$name]["value"] = $default;
    }
    //Метод
    final public function __get($name)
    {
        if (array_key_exists($name, $this->properties)){
            return $this->properties[$name]["value"];
        }
        return null;
    }
    //Метод настройки свойств
    final public function __set($name, $value)
    {
        if (array_key_exists($name, $this->properties)){
            $this->properties[$name]["value"] = $value;

        }
        else return false;
    }
    //Метод получения свойств
    final protected function getProperties() {
        $ret = array();
        foreach ($this->properties as $name => $value) {
            $ret[$name] = $value["value"];
        }
        return $ret;
    }
    //Метод по работе с комплексными данными
    final protected function getComplexValue($obj, $field) {
        if (strpos($field, "->") !== false) $field = explode("->", $field);
        if (is_array($field)) {
            $value = $obj;
            foreach ($field as $f) {
                $value = $value->{$f};
            }
        }
            else $value = $obj->$field;
            return $value;

    }
    //
    final public function __toString()
    {
       $this->preRender();
       return $this->view->render($this->getTmplFile(), $this->getProperties(), true);
    }

    protected function preRender(){};

    //Метод склонения слов
    final protected function numberOf($number, $suffix) {
        $keys = array(2, 0, 1, 1, 1, 2);
        $mod = $number % 100;
        $suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod %10, 5)];
        return $suffix[$suffix_key];
    }

    abstract public function getTmplFile();

}

?>