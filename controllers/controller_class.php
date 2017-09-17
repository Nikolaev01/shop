<?php
abstract class Controller extends AbstractController{
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

    protected function access404()
    {
        //$host = "http://".$_SERVER["HTTP_HOST"]."/";
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
        $params["header"] = $this->getHeader();
        $params["top"] = $this->getTop();

        $this->view->render(Config::LAYOUT, $params);
    }

    protected function getHeader(){
        $header = new Header();
        $header->title = $this->title;
        $header->meta("Content-Type", "text/html; charset=utf-8", true);
        $header->meta("description", $this->meta_desc, false);
        $header->meta("keywords", $this->meta_key, false);
        $header->meta("viewport", "width=device-width", false);
        $header->favicon = "/favicon.ico";
        $header->css = array("/css/main.css", "/css/media.css");
        $header->js = array("/js/jquery.min.js", "/js/script.js", "/js/slider.js");
        return $header;
    }

    protected function getTop()
    {
        $items = MenuDB::getTopMenu();
        $topmenu = new Menu();
        $topmenu->uri = $this->url_active;
        $topmenu->items = $items;
        return $topmenu;
        //print_r($topmenu);
        /* $header->title = $this->title;
         $header->meta("Content-Type", "text/html; charset=utf-8", true);
         $header->meta("description", $this->meta_desc, false);
         $header->meta("keywords", $this->meta_key, false);
         $header->meta("viewport", "width=device-width", false);
         $header->favicon = "/favicon.ico";
         $header->css = array("/css/main.css", "/css/media.css");
         $header->js = array("/js/jquery.min.js", "/js/script.js", "/js/slider.js");*/

    }
    protected function getOffset($count_on_page){
        return $count_on_page * ($this->getPage() - 1);
    }
    protected function getPage(){
        $page = ($this->request->page)? $this->request->page: 1;
        if ($page < 1) $this->notFound();
        return $page;
    }
    final protected function getPagination(){}
    }

?>