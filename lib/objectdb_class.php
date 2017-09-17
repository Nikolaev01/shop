<?php
abstract class ObjectDB extends AbstractObjectDB{

    public function __construct($table_name)
    {
        parent::__construct($table_name,Config::FORMAT_DATE);
    }
}
?>