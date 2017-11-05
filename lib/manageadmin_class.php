<?php
class ManageAdmin extends Manage {
    private $url_admin;
    public function __construct()
    {
       parent::__construct();
    }

    public function auth(){
        $sm = new SystemMessage();
        $auth = new Auth();
        $_SESSION["login"] = $this->data["login"];
        $_SESSION["password"] = Subsidiary::hash($this->data["password"]);
        if ($auth->checkAdmin($_SESSION["login"], $_SESSION["password"])) {
            return true;
        }
        else {
            return $sm->messages("AUTH_ERROR");
        }
    }

    public function logout(){
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);
        unset($_SESSION["message"]);
    }





}
?>