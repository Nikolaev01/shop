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
        //блок с хитами
        $hits = new Hits();
        $hit = ProductDB::getAllWithImgforHits("product_img", 7);
        $hits->hit = $hit;
        $hits->part_images = Config::DIR_IMG;
        //Блок с распродажей
        $sale = new Sale();
        $sal = ProductDB::getAllWithImgforHits("product_img", 7);
        $sale->sal = $sal;
        $sale->part_images = Config::DIR_IMG;
        $this->render($this->renderData(array("slider" => $slider, "hits" => $hits, "sale" => $sale), "index"));
    }

    public function actionCategory(){
        $category_db = new CategoryDB();
        $category_db->load($this->request->id);
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";
        $category = CategoryDB::getAll();
        $category_block = new CategoryBlock();
        $category_block->category = $category;
        $item = ProductDB::getAllWithImgRand("product_img", 20);
        $product = new Product() ;
        $product->product = $item;
        $this->render($this->renderData(array("category_block" => $category_block, "product" => $product), "category"));
    }




    public function actionContact(){
        $this->title = "Интернет магазин сант";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";
        //сдайдер
        $slide = SliderDB::getSlider();
        $slider = new Slider();
        $slider->slide = $slide;
        //блок с хитами
        $hits = new Hits();
        $hit = ProductDB::getAllWithImgforHits("product_img", 7);
        $hits->hit = $hit;
        $hits->part_images = Config::DIR_IMG;
        //Блок с распродажей
        $sale = new Sale();
        $sal = ProductDB::getAllWithImgforHits("product_img", 7);
        $sale->sal = $sal;
        $sale->part_images = Config::DIR_IMG;
        $this->render($this->renderData(array("slider" => $slider, "hits" => $hits, "sale" => $sale), "index"));
    }



}

?>