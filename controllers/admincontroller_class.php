<?php
class AdminController extends Controller{


    public function __construct($check_auth = true)
    {
        parent::__construct(new View("/admin".Config::DIR_TMPL), new Message(Config::FILE_MESSAGES));
        $auth = $this->checkAuth();
        if ($check_auth && !$auth) $this->redirectAuth();

    }

    protected function Adminrender($str){
        $params = array();
        //перечисление всех параметров
        $params["header"] = $this->getHeader();//блок head
        $params["bottom"] = $this->getBottom();//Нижнее меню
        $params["center"] = $str;

        $this->view->render(Config::ADMIN_DIR_TMPL.Config::LAYOUT, $params);
    }

    public function actionPage(){
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";
        $orders = new AdminOrders();
        $order = OrderDB::getAll();
        $i = 1;
        foreach ($order as $item) {
            if($item->status == "not_confirm") $item->status = "Не подтвержден";
            if ($item->delivery == "cur") $item->delivery = "Курьерская";
            if ($item->delivery == "sam") $item->delivery = "Самовывоз";
            $item->number = $i;
            $item->view = URL::get("order/view", "admin", array("id" => $item->id));
            $item->update = URL::get("order/update", "admin", array("id" => $item->id));
            $item->delete = URL::get("order/delete", "admin", array("id" => $item->id));
            $i++;
        }
        //print_r($orders);
        //$a["logout"] = URL::get("?func=logout", Config::FILE_FUNC_ADMIN);
        $this->Adminrender($this->renderData(array("orders" => $order, "logout" => URL::get("?func=logout", Config::FILE_FUNC_ADMIN), "order" => $order, "action" => $form_action), Config::ADMIN_DIR_TMPL."orders"));

        //$this->view->render(Config::ADMIN_DIR_TMPL.Config::ADMIN_LAYOUT, $a);
    }
    public function actionOrder(){


        //$a["orders"] = $orders;
        //$a["pr_name"] = Config::SITENAME;
        //$a["link_pr"] = Config::ADDRESS;
        //a["header"] = $this->getHeader();
        //$a["logout"] = URL::get("?func=logout", Config::FILE_FUNC_ADMIN);

        $orders = "";

        $this->Adminrender($orders);
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