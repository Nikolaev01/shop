<?php
abstract class ObjectDB extends AbstractObjectDB{

    public function __construct($table_name)
    {
        parent::__construct($table_name,Config::FORMAT_DATE);
    }

    public static function buildmuArray($class = array(), $data){
      $ret = array();
      if(is_array($class)){
          for ($i=0; count($class); $i++){
              if (!class_exists($class[$i])) throw new Exception();
              $test_obj[$i] = new $class[$i]();
              if (!$test_obj[$i] instanceof AbstractObjectDB) throw new Exception();
              foreach ($data as $row) {
                  $obj = new $class[$i]();
                  $obj->init($row);
                  $ret[$obj->getID()] = $obj;
              }
          }
          return $ret;
      }
      else{
          if (!class_exists($class)) throw new Exception();
          $test_obj = new $class();
          print_r($test_obj);
          if (!$test_obj instanceof AbstractObjectDB) throw new Exception();
          foreach ($data as $row) {
              $obj = new $class();
              $obj->init($row);
              $ret[$obj->getID()] = $obj;
          }
            return $ret;
      }
    }

}
?>