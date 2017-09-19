<?php
class MainController extends Controller{


    public function actionIndex(){
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";

        $slide = SliderDB::getSlider();
        $slider = new Slider();
        $slider->slide = $slide;
        //print_r($slider->uri);
        $this->render($this->renderData(array("slider" => $slider), "index"));
    }
}

?>