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
        $hornavs = $this->getHornav();
        //if ($product_db->category_id) {
           //$hornavs->addData($category_db->title, $category_db->link);
        //}
        //$hornavs->addData($product_db->title);
        $this->render($this->renderData(array("category_block" => $category_block, "product" => $product, "hornav" => $hornavs), "category"));
    }

public function actionProduct(){
        $product_db = new ProductDB();
        $product_db->load($this->request->id);
        $category_db = new CategoryDB();
        $category_db->load($product_db->category_id);
        $this->title = $product_db->title;
        $this->meta_desc = $product_db->meta_desc;
        $this->mata_key = $product_db->meta_key;
        //горизонтальная навигация
        $hornavs = $this->getHornav();
        if ($product_db->category_id) {
            $hornavs->addData($category_db->title, $category_db->link);
        }
        $hornavs->addData($product_db->title);
        $image = ProductImgDB::getAllonProductID($product_db->id);
        $product = new ProductPage();
        $product->products = $product_db;
        $product->link_addcart = URLPage::getLinkAddCart($product->products->id);
        $product->link_compare = URLPage::getLinkAddCompare($product->products->id);
        $product->images = $image;
        $product->hornav = $hornavs;
        $this->render($product);
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