<?php
class Subsidiary {

    public static function gt(){
        return time();
    }

    public static function hash($str){
        return md5($str.Config::SECRET);
    }


}