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
        $params["top"] = $this->getTop();//Верхнее меню
        $params["bottom"] = $this->getBottom();//Нижнее меню
        $params["center"] = $str;

        $this->view->render(Config::LAYOUT, $params);
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
        $header->js = array("/js/jquery.min.js", "/js/script.js", "/js/slider.js");
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
    final protected function getSort($up = false)
    {
        $sort = new Sort();
        $url = URL::current();
        if ($this->request->sort)$url = URL::deleteGET($url, "sort");
        $sort->link_sale = URL::addGET($url,"sort","discount");
        $sort->link_price = URL::addGET($url,"sort", "price");
        if ($this->request->up)$url = URL::deleteGET($url, "up");
        $sort->link_up = URL::addGET($url,"up", "up");
        $sort->link_down = URL::addGET($url,"up", "down");
        return $sort;
    }


}
?>