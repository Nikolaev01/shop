<?php
class MainController extends Controller{
    public function actionIndex(){
        $this->title = "Интернет магазин сантехники";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";
        $this->render($this->renderData(array("blog" => $blog), "index"));
    }
}

?>