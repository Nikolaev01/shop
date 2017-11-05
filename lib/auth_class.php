<?php
class Auth{
    public function checkAdmin($login, $password, $hash = true){
        if (!$hash) $password = Subsidiary::hash($password);
        $login = mb_strtolower($login);
        $real_login = mb_strtolower(Config::ADMIN_LOGIN);
        return (($login === $real_login) && ($password === Config::ADMIN_PASSWORD));
    }

}


?>