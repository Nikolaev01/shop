<?php
class Subsidiary {

    public static function gt(){
        return time();
    }

    public static function hash($str){
        return md5($str.Config::SECRET);
    }

    public static function getFullDate($second){
        $date = getdate($second);
        return $date['hours'].":".$date['minutes'].":".$date['seconds'];
    }


}