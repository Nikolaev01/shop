<?php
abstract class Controller extends AbstractController
{
    protected $title;
    protected $meta_desc;
    protected $meta_key;
    protected $mail = null;
    protected $url_active;
    protected $category_id = 0;

    public function __construct()
    {
        parent::__construct(new View(Config::DIR_TMPL), new Message(Config::FILE_MESSAGES));
        $this->mail = new Mail();
        $this->url_active = URL::deleteGET(URL::current(Config::ADDRESS), "page");
    }

    public function action404()
    {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        $this->title = "Запрашиваемой страницы не существует - 404";
        $this->meta_desc = "Запрашиваемой страницы не существует - 404";
        $this->meta_key = "Страница не найдена, страницы не существует";
        $pm = new PageMessage();
        $pm->header = "Страница не найдена";
        $pm->text = "К сажелению запрошенной страницы не найдено";
        $this->render($pm);
    }

    protected function accessDenied()
    {
        $this->title = "Доступ закрыт!";
        $this->meta_desc = "Доступ к данной странице закрыт.";
        $this->meta_key = "Доступ закрыт, доступ закрыт страница";
        $pm = new PageMessage();
        $pm->header = "Доступ закрыт";
        $pm->text = "У вас нет прав доступа к данной странице.";
        $this->render($pm);
    }

    final protected function render($str)
    {
        $params = array();
        //перечисление всех параметров
        $params["header"] = $this->getHeader();//блок head
        $params["cart"] = $this->setInfoCart();
        $params["top"] = $this->getTop();//Верхнее меню
        $params["bottom"] = $this->getBottom();//Нижнее меню
        $params["center"] = $str;

        $this->view->render(Config::LAYOUT, $params);
    }
    private function setInfoCart(){
        $cart = new Cart();
        $cart->link_cart = URL::get("cart", "");
        if (!isset($_SESSION["card"])){
            $_SESSION["card"] = "";
            $cart->cart_count = "0";
            $cart->cart_summa = "0";
        }
        else {
            $ids = explode(",", $_SESSION["card"]);
            $summa = ProductDB::getPriceOnIDs($ids);
            $summa = number_format($summa, 0, ',', ' ');
            if ($ids[0] == 0) $cart->cart_count = 0;
            else $cart->cart_count = count($ids);
            $cart->cart_summa = $summa;
        }
        return $cart;
    }

    protected function getHeader()
    {
        $header = new Header();
        $header->title = $this->title;
        $header->meta("Content-Type", "text/html; charset=utf-8", true);
        $header->meta("description", $this->meta_desc, false);
        $header->meta("keywords", $this->meta_key, false);
        $header->meta("viewport", "width=device-width", false);
        $header->favicon = "/favicon.ico";
        $header->css = array("/css/main.css", "/css/media.css");
        $header->js = array("/js/jquery.min.js", "/js/jquery.validate.min.js", "/js/jquery.maskedinput.min.js", "/js/script.js", "/js/slider.js");

        return $header;
    }

    /**
     * @return TopMenu
     */
    protected function getTop()
    {
        $items = MenuDB::getTopMenu();
        $topmenu = new TopMenu();
        $topmenu->uri = $this->url_active;
        $topmenu->items = $items;
        return $topmenu;
    }

    protected function getBottom()
    {
        $items = MenuDB::getTopMenu();
        $bottommenu = new BottomMenu();
        $bottommenu->uri = $this->url_active;
        $bottommenu->items = $items;
        return $bottommenu;
    }




    protected function getHornav()
    {
        $hornav = new Hornav();
        $hornav->addData("Главная", URL::get(""));
        return $hornav;
    }

    protected function getOffset($count_on_page)
    {
        return $count_on_page * ($this->getPage() - 1);
    }

    protected function getPage()
    {
        $page = ($this->request->page) ? $this->request->page : 1;
        if ($page < 1) $this->notFound();
        return $page;
    }

    final protected function getPagination($count_elements, $count_on_page, $url = false)
    {
        $count_pages = ceil($count_elements / $count_on_page);
        $active = $this->getPage();
        if (($active > $count_pages) && ($active > 1)) $this->notFound();
        $pagination = new Pagination();
        if ($this->request->page) $url = URL::deletePage(URL::current());
        $pagination->url = $url;
        $pagination->url_page = URL::addTemplatePage($url);
        $pagination->count_elements = $count_elements;
        $pagination->count_on_page = $count_on_page;
        $pagination->count_show_pages = Config::COUNT_SHOW_PAGES;
        $pagination->active = $active;
        return $pagination;
    }
    final protected function getSort()
    {
        $sort = new Sort();
        $url = URL::current();
        $url2 = $url;
        if($this->request->sort && $this->request->up){
            $url = URL::deleteGET($url, "up");
            $url = URL::deleteGET($url, "sort");
            $sort->link_sale = URL::addGET($url,"sort","discount");
            $sort->link_sale = URL::addGET($sort->link_sale,"up",$this->request->up);
            $sort->link_price = URL::addGET($url,"sort", "price");
            $sort->link_price = URL::addGET( $sort->link_price,"up", $this->request->up);
            $sort->link_up = URL::addGET($url,"sort", $this->request->sort);
            $sort->link_up = URL::addGET($sort->link_up,"up", "up");
            $sort->link_down = URL::addGET($url,"sort", $this->request->sort);
            $sort->link_down = URL::addGET($sort->link_down,"up", "down");
        }
        elseif ($this->request->sort){
            $url = URL::deleteGET($url, "sort");
            $sort->link_sale = URL::addGET($url,"sort","discount");
            $sort->link_price = URL::addGET($url,"sort", "price");
            $sort->link_up = URL::addGET($url2,"up", "up");
            $sort->link_down = URL::addGET($url2,"up", "down");
        }
        elseif($this->request->up){
            $url = URL::deleteGET($url, "up");
            $sort->link_sale = URL::addGET($url,"sort","discount");
            $sort->link_sale = URL::addGET($sort->link_sale,"up",$this->request->up);
            $sort->link_price = URL::addGET($url,"sort", "price");
            $sort->link_price = URL::addGET( $sort->link_price,"up", $this->request->up);
            $sort->link_up = URL::addGET($url,"up", "up");
            $sort->link_down = URL::addGET($url,"up", "down");
        }
        else{
            $sort->link_sale = URL::addGET($url,"sort","discount");
            $sort->link_price = URL::addGET($url,"sort", "price");
            $sort->link_up = URL::addGET($url,"up", "up");
            $sort->link_down = URL::addGET($url,"up", "down");
        }
        $sort->request = $this->request->sort;
        $sort->request_up = $this->request->up;
        return $sort;
    }

    protected function getCountInArray($v, $ids){
        $count = 0;
        for ($i = 0; $i < count($ids); $i++){
            if ($ids[$i] == $v) $count++;
        }
        return $count;
    }




}
?>