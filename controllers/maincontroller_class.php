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
        for($i = 0; $i < count($hit); $i++){
            $hit[$i]['price'] = number_format($hit[$i]['price'], 0, ',', ' ');
        }
        $hits->hit = $hit;
        $hits->part_images = Config::DIR_IMG;
        //Блок с распродажей
        $sale = new Sale();
        $sal = ProductDB::getAllWithImgforHits("product_img", 7);
        for($i = 0; $i < count($sal); $i++){
            $sal[$i]['price'] = number_format($sal[$i]['price'], 0, ',', ' ');
        }
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

            //if($sort->categoru_name == "");
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
        //if($sort->category_name == null) $sort->categoru_name = false;
        for($i = 0; $i < count($item); $i++){
            $item[$i]['price'] = number_format($item[$i]['price'], 0, ',', ' ');
        }
        $product->product = $item;
        $this->render($this->renderData(array("category_block" => $category_block, "product" => $product, "hornav" => $hornavs, "sort" => $sort), "category"));
    }
    public function actionProduct(){
            $product_db = new ProductDB();
            $product_db->load($this->request->id);
            $product_db->price = number_format($product_db->price, 0, ',', ' ');
            if (!$product_db->isSaved()) $this->notFound();
            $category_db = new CategoryDB();
            $category_db->load($product_db->category_id);
            $this->title = $product_db->title;
            $this->meta_desc = $product_db->meta_desc;
            $this->mata_key = $product_db->meta_key;
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
            $bues = ProductDB::getAllWithImgRand("product_img", 7);
            foreach ($bues as $key => $value){
                $bues[$key]['price'] = ObjectDB::getPrOnPrice($bues[$key]['price']);
            }
            $bue->sal = $bues;
            $option_item = ProductDB::getAllOptionFromProduct($this->request->id, OptionDB::getTableName(), OptionValueDB::getTableName(), ProductOptionValueDB::getTableName());
            $option = new OptionProduct();
            $option->item = $option_item;
            $product->option = $option;
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
    public function actionCart(){
        $this->title = "Страница корзины";
        $this->meta_desc = "Интернет магазин сантехники";
        $this->mata_key = "Интернет магазин, сантехники";
        $this->pagename = "Корзина";
        $discount = new DiscountDB();
        $cart = array();
        $summa = 0;
        $cart_item = new CartItem();
        $hornavs = $this->getHornav();
        $hornavs->addData($this->pagename);
        if(isset($_SESSION["card"])){
            $ids = explode(",", $_SESSION["card"]);
            if($ids == array()) $items = array();
            else $items = ProductDB::getAllOnProductIDsWithIMG("product_img", $ids);
            $result = array();
            for ($i = 0; $i < count($items); $i++){
                $result[$items[$i]['id']] = $items[$i];
            }
            $ids_unique = array_unique($ids);
            $i = 0;
            if($ids_unique[0] !== '') {
                foreach ($ids_unique as $v) {
                    $cart[$i]["id"] = $result[$v]['id'];
                    $cart[$i]["title"] = $result[$v]['title'];
                    $cart[$i]["image"] = $result[$v]['image'];
                    $cart[$i]["link"] = $result[$v]['link'];
                    $cart[$i]["price"] = $result[$v]['price'];
                    $cart[$i]["code"] = $result[$v]['code'];
                    $cart[$i]["inst_price"] = $result[$v]['inst_price'];
                    $cart[$i]["delete_cart"] = $result[$v]['delete_cart'];
                    $cart[$i]["count"] = $this->getCountInArray($v, $ids);
                    $cart[$i]["summa"] =  $cart[$i]["count"]*$cart[$i]["price"];
                    $summa += $cart[$i]["summa"];
                    $cart[$i]["price"] = ObjectDB::getPrOnPrice($result[$v]['price']);
                    $cart[$i]["inst_price"] = ObjectDB::getPrOnPrice($result[$v]['inst_price']);
                    $i++;
                }
                $summa_all = $summa;
                if(isset($_SESSION["discount"])) {
                    $value = $discount->getValueOnCode($_SESSION["discount"]);
                    if ($value) {
                        $summa *= (1 - $value);
                    }
                }
                else {
                    $_SESSION["discount"] = "";
                    $value = "";
                }
            }
        }
        else $cart = array();
        $cart_item->cart_items = $cart;
        $cart_item->page_name = $this->pagename;
        if ($cart_item->cart_items == array()) $order = "";
        else {
            $order = new Order();
            $summa = ObjectDB::getPrOnPrice($summa);
            $order->summa_all = ObjectDB::getPrOnPrice($summa_all);
            $order->summa = $summa;
            $order->discount = $_SESSION["discount"];
            $order->price_discount = 0;
            $order->link_pageorder = URLPage::getOrderPage();
            if ($value) {
                $order->price_discount = ObjectDB::getPrOnPrice($summa_all * $value);
            }
        }
        $form_action = URLPage::action();
        $this->render($this->renderData(array("hornav" => $hornavs, "cart_item" => $cart_item, "order" => $order, "action" => $form_action), "cartpage"));
    }
    public function actionOrder(){
        $this->title = "Оформление заказа";
        $this->meta_desc = "Оформление заказа на покупку сантехнических изделий";
        $this->mata_key = "заказ, оформление заказа, оформение заказа сантехники";
        $this->pagename = "Оформление заказа";
        $order = new OrderPage();
        $cart_item = new CartItem();
        if(!isset($_SESSION["delivery"]))$_SESSION["delivery"] = "";
        if(!isset($_SESSION["comment"]))$_SESSION["comment"] = "";
        if(!isset($_SESSION["name"]))$_SESSION["name"] = "";
        if(!isset($_SESSION["phone"]))$_SESSION["phone"] = "";
        if(!isset($_SESSION["email"]))$_SESSION["email"] = "";
        if(!isset($_SESSION["shipping_pay"]))$_SESSION["shipping_pay"] = "";
        if(!isset($_SESSION["punkt"]))$_SESSION["punkt"] = "";
        if(!isset($_SESSION["index"]))$_SESSION["index"] = "";
        if(!isset($_SESSION["addres"]))$_SESSION["addres"] = "";


        $hornavs = $this->getHornav();
        $hornavs->addData("Корзина", URL::get('cart', ''));
        $hornavs->addData($this->pagename);

        $order->hornav = $hornavs;
        $order->action = URLPage::action();
        $order->delivery = $_SESSION["delivery"];
        $order->comment = $_SESSION["comment"];
        $order->name = $_SESSION["name"];
        $order->email = $_SESSION["email"];
        $order->phone = $_SESSION["phone"];
        $order->shipping = $_SESSION["shipping_pay"];
        $order->punkt = $_SESSION["punkt"];
        $order->comment = $_SESSION["comment"];
        $order->index = $_SESSION["index"];
        $order->addres = $_SESSION["addres"];
        $order->message = $this->messageForm();


        $this->render($order);
        //$this->render($this->renderData(array("hornav" => $hornavs, "action" => $form_action, ), "orderpage"));
    }
}
?>