<?php
abstract class AbstractController {
    protected $view;
    protected $request;
    protected $fp = null;
    protected $auth_user = null;
    protected $jsv = null;
    public function __construct($view, $message)
    {
        if (!session_id()) session_start();
        $this->view = $view;
        $this->request = new Request();
        $this->fp = new FormProcessor ($this->request, $message);
        $this->jsv = new JSValidator($message);
        $this->auth_user = $this->authUser();
        if (!$this->access()){
            $this->accessDenied();
            throw new Exception("ACCESS_DENIED");
        }
    }
    abstract protected function render ($str);
    protected function authUser(){
        return null;
    }
    protected function access(){
        return false;
    }
    abstract protected function accessDenied();
    abstract protected function access404();
    //Редирект на страницу 404
    final protected function notFound(){
        $this->action404();
    }
    //Редирект на определенный URL адресс
    final protected function redirect ($url) {
        header("Location: $url");
        exit;
    }
    //Метод возвращения страницы
    final protected function renderData ($modules, $layout, $params = array()){
        if (!is_array($modules)) return false;
        foreach ($modules as $key => $value){
            $params[$key] = $value;
        }
        return $this->view->render($layout, $params, true);
    }
}
?>