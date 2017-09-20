<?php
class MainController extends Controller{


    public function actionIndex(){
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";
        //сдайдер
        $slide = SliderDB::getSlider();
        $slider = new Slider();
        $slider->slide = $slide;
        $hits = new Hits();
        $hit = ProductDB::getAll();
        //print_r($hits);
        $hits->hit = $hit;
        $hits->part_images = Config::DIR_IMG;
        print_r($hits->hit);
        // $product_img = ProductDB::getImgOnProductID("1");
        //$hits->product_img = $product_img;
        //$hits->
        //Хитты продаж
        //print_r($slider->uri);
       //$hits ="";

        $this->render($this->renderData(array("slider" => $slider, "hits" => $hits), "index"));
    }
}

?>