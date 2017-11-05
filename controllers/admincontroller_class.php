<?php
class AdminController extends Controller{


    public function __construct($check_auth = true)
    {
        parent::__construct();
        $auth = $this->checkAuth();
        if ($check_auth && !$auth) $this->redirectAuth();

    }

    public function actionPage(){
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";

        $a = array();
        $a["header"] = $this->getHeader();
        $a["logout"] = URL::get("?func=logout", Config::FILE_FUNC_ADMIN);
        $this->view->render(Config::ADMIN_LAYOUT, $a);
    }


    private function checkAuth(){
        $auth = new Auth();
        if (!isset($_SESSION["login"])) $_SESSION["login"] = "";
        if (!isset($_SESSION["password"])) $_SESSION["password"] = "";
        return $auth->checkAdmin($_SESSION["login"], $_SESSION["password"]);
    }
    private function redirectAuth() {
        if(URL::getControllerAndAction()[0] == "admin" && URL::getControllerAndAction()[1] == "auth") return false;
        $this->redirect(Config::ADDRESS.URL::get("auth", "admin", array()));
    }

    public function actionAuth(){
        if($this->checkAuth()){
            $this->redirect(URL::get("page", "admin", array()));
        }
        else {
            $this->__construct(false);
            $this->title = "Вход в админ панель";
            $this->meta_desc = "Вход в админ панель";
            $this->mata_key = "Интернет магазин, сантехники";
            $a = array();
            $a["header"] = $this->getHeader();
            $a["message"] = $this->messageForm();
            $a["action"] = Config::FILE_FUNC_ADMIN;
            $this->view->render(Config::AUTH_LAYOUT, $a);
        }
    }


}