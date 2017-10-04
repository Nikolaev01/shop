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
        $sale->name = "Распродажа";
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
        $product = new Product() ;
        if ($this->request->page){
            $item = ProductDB::getAllonCategoryID("product_img", $this->request->id, Config::COUNT_ARTICLES_ON_PAGE, ($this->request->page - 1) * Config::COUNT_ARTICLES_ON_PAGE, $this->request->sort, $this->request->up);
        }
        else{
            $item = ProductDB::getAllonCategoryID("product_img", $this->request->id, Config::COUNT_ARTICLES_ON_PAGE, false, $this->request->sort, $this->request->up);
        }
        $hornavs = $this->getHornav();
        $pagination = $this->getPagination(count(ProductDB::getAllonCategoryID("product_img", $this->request->id)), Config::COUNT_ARTICLES_ON_PAGE, URL::current());
        $sort = $this->getSort();
        if($this->request->id){
            if (!$category_db->isSaved()) {
                $this->notFound();
                exit;
            }
            $hornavs->addData("Каталог", URL::get("category", ""));
            $hornavs->addData($category_db->title);
            $this->title = "Интернет магазин сант. ".$category_db->title;
            $this->meta_desc = "Интернет магазин сантехники ".$category_db->title;
            $this->mata_key = "Интернет магазин, сантехники ".$category_db->title;
            $sort->category_name = $category_db->title;
            $product->pagination = $pagination;
        }
        else {
            $this->title = "Интернет магазин сант";
            $this->meta_desc = "Интернет магазин сантехники";
            $this->mata_key = "Интернет магазин, сантехники";
            $hornavs->addData("Каталог");
            $category_name = "Каталог";
            $product->pagination = $pagination;
        }
        $product->product = $item;
        $this->render($this->renderData(array("category_block" => $category_block, "product" => $product, "hornav" => $hornavs, "sort" => $sort), "category"));
    }

public function actionProduct(){
        $product_db = new ProductDB();
        $product_db->load($this->request->id);
        if (!$product_db->isSaved()) $this->notFound();
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
        $bue = new Bye();
        $bue->name = "С этим товаром также заказывают";
        $bue->part_images = Config::DIR_IMG;
        $bues =ProductDB::getAllWithImgRand("product_img", 7);
        $bue->sal = $bues;
        $this->render($product.$bue);
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