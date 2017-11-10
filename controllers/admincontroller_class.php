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
        $params["logout"] = URL::get("", Config::FILE_FUNC_ADMIN, array("func" => "logout"));
        $params["orders"] = URL::get("", "admin/page");
        $this->view->render(Config::ADMIN_DIR_TMPL.Config::LAYOUT, $params);
    }

    public function actionPage(){
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";


        //print_r($this->request->view);

        $orders = new AdminOrders();
        $order = OrderDB::getAll();
        $i = 1;
        foreach ($order as $item) {
            if($item->status == "not_confirm") $item->status = "Не подтвержден";
            if ($item->delivery == "cur") $item->delivery = "Курьерская";
            if ($item->delivery == "sam") $item->delivery = "Самовывоз";
            $item->number = $i;
            $item->view = URL::get("order", "admin", array("action" => "view","id" => $item->id));
            $item->update = URL::get("order/update", "admin", array("id" => $item->id));
            //$item->delete = URL::get("?func=delete", Config::FILE_FUNC_ADMIN, array("id" => $item->id));
            $item->delete = URLPage::getLinkDelOrder($item->id);
            $i++;
        }
        $this->Adminrender($this->renderData(array("orders" => $order, "logout" => URL::get("?func=logout", Config::FILE_FUNC_ADMIN), "order" => $order), Config::ADMIN_DIR_TMPL."orders"));


    }
    public function actionOrder(){
       // print_r($this->request);
        if($this->request->action == "view"){
            $orderus = new OrderDB();
            $orderus->load($this->request->id);
            //$order = OrderDB::getAllOnIDs(array($this->request->id));
            $vieworder = new ViewOrder();
            $vieworder->name = $orderus->name;
            $vieworder->id = $orderus->id;
            $vieworder->delivery = $orderus->delivery;
            $vieworder->product_ids = $orderus->product_ids;
            $vieworder->price = $orderus->price;
            $vieworder->phone = $orderus->phone;
            $vieworder->email = $orderus->email;
            $vieworder->address = $orderus->address;
            $vieworder->notice = $orderus->notice;
            $vieworder->notice = $orderus->notice;
            $vieworder->status = $orderus->status;
            $vieworder->product_ids_inst = $orderus->product_ids_inst;
            $vieworder->date_pay = Subsidiary::getFullDate($orderus->date_pay);
            $vieworder->date_send = Subsidiary::getFullDate($orderus->date_send);
            $vieworder->date_order = Subsidiary::getFullDate($orderus->date_order);

            //print_r($vieworder->order);
            $this->Adminrender($vieworder);


        }




        //$this->Adminrender($orders);
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
            $this->view->render(Config::ADMIN_DIR_TMPL.Config::AUTH_LAYOUT, $a);
        }
    }


}