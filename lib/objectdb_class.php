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
    public static function existsID($id){
       return self::isExistsFV("id", $id);
    }
    protected static function isExistsFV($field, $value){
        $result = self::getAllOnField(ProductDB::getTableName(), "ProductDB", $field, $value);
        return count($result) != 0;
    }
    protected function getField($field_in, $value_in, $field_out){
        $query = "SELECT `$field_out` FROM `".Config::DB_PREFIX.$this->table_name."` WHERE `$field_in` = ".Config::DB_SYM_QUERY;
        $params = array();
        for ($i = 0; $i < count($value_in); $i++) {
            $params[] = $value_in;
        }
        $query = self::$db->getQuery($query, $params);
        return self::$db->selectCell($query);
    }
    public static function getPrOnPrice($price){
        return number_format($price, 0, ',', ' ');
    }


}
?>