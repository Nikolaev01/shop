<?php
//Класс для работы с базой данных
abstract class AbstractDataBase {
    private $mysqli;
    private $sq;
    private $prefix;
    //В конструкторе вызываем подключение к БД
    protected function __construct($db_host, $db_user, $db_password, $db_name, $sq, $prefix)
    {
        $this->mysqli = @new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($this->mysqli->connect_errno) exit("Ошибка соединения с базой данных");
        $this->sq = $sq;
        $this->prefix = $prefix;
        $this->mysqli("SET lc_time_names = 'ru_RU'");
        $this->mysqli->set_charset("utf8");
    }
    //Функция для доступа к значению в запросе к символу sq-символ
    public function getSQ(){
        return $this->sq;
    }
    //Фукция примающая запрос с параметрами
    public function getQuery($query, $params){
        if ($params){
            $offset = 0;
            $len_sq = strlen($this->sq);
            for ($i = 0; $i < count($params); $i++){
                $pos = strpos($query, $this->sq, $offset);
                if (is_null($params[$i])) $arg = "NULL";
                else $arg = "'".$this->mysqli->real_escape_string($params[$i])."'";
                $query = substr_replace($query, $arg, $pos, $len_sq);
                $offset = $pos + strlen($arg);
            }
        }
        return $query;
    }
    //Метод занимающийся выборкой значений в таблице
    public function select(AbstractSelect $select){
        $result_set = $this->getResultSet($select, true, true);
        if (!$result_set) return false;
        $array = array();
        while (($row = $result_set->fetch_assoc()) != false)
            $array[] = $row;
        return $array;
    }
    //Метод извлекающий строку из таблицы
    public function selectRow (AbstractSelect $select){
        $result_set = $this->getResultSet($select, false, true);
        if (!$result_set) return false;
        return $result_set->fetch_assoc();
    }
    //Метод извлекающий столбец из таблицы
    public function selectCol (AbstractSelect $select){
        $result_set = $this->getResultSet($select, true, true);
        if (!$result_set) return false;
        $array = array();
        while (($row = $result_set->fetch_assoc())!= false) {
            foreach ($row as $value){
                $array[] = $value;
                break;
            }
        }
        return $array;
    }
    //Метод извлекает слдержимое ячейки
    public function selectCell(AbstractSelect $select){
        $result_set = $this->getResultSet($select, false, true);
        if (!$result_set) return false;
        $arr = array_values($result_set->fetch_assoc());
        return $arr[0];
    }
    //Метод вставки в таблицу
    public function insert ($table_name, $row){
        if (count($row) == 0) return false;
        $table_name = $this->getTableName($table_name);
        $fields = "(";
        $values = "VALUES (";
        $params = array();
        foreach ($row as $key => $value){
            $fields .= "`$key`,";
            $values .= $this->sq.",";
            $params[] = $value;
        }
        $fields = substr($fields, 0, -1);
        $values = substr($fields, 0, -1);
        $fields .= ")";
        $values .= ")";
        $query = "INSERT INTO `$table_name` $fields $values";
        return $this->query($query, $params);
    }
    //Метод обновления записи в таблице
    public function update ($table_name, $row, $where = false, $params = array()){
        if (count($row) == 0) return false;
        $table_name = $this->getTableName($table_name);
        $query = "UPDATE `$table_name` SET ";
        $params_add = array();
        foreach ($row as $key =>$value){
            $query .= "`$key` = ".$this->sq.",";
            $params_add = $value;
        }
        $query = substr($query, 0, -1);
        if ($where){
            $params = array_merge($params_add, $params);
            $query .= " WHERE $where";
        }
        return $this->query($query, $params);
    }
    //Метод удаления записей из таблицы
    public function delete ($table_name, $where = false, $params = array()){
        $table_name = $this->getTableName($table_name);
        $query = "DELETE FROM `$table_name`";
        if ($where) $query .= " WHERE $where";
        return $this->query($query, $params);
    }
    //Метод возвращающий полное название таблицы с префиксом
    public function getTableName ($table_name){
        return $this->prefix.$table_name;
    }
    //Метод делающий запрос
    private function query ($query, $params = false){
        $success = $this->mysqli->query($this->getQuery($query, $params));
        if (!$success) return false;
        if ($this->mysqli->insert_id === 0) return true;
        return $this->mysqli->insert_id;
    }
    //Метод получения результата запроса
    private function getResultSet (AbstractSelect $select, $zero, $one){
        $result_set = $this->mysqli->query($select);
        if (!$result_set) return false;
        if ((!$zero) $$ ($result_set->num_rows == 0)) return false;
        if ((!$one) $$ ($result_set->num_rows == 1)) return false;
        return $result_set;
    }
    //Закрываем соединение с БД
    public function __destruct()
    {
        if (($this->mysqli) && (!$this->mysqli->connect_errno)) $this->mysqli->close();
    }
}

?>