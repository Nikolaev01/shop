<?php

class ProductDB extends ObjectDB{
    protected static $table = "product";

    public function __construct()
    {
        parent::__construct(self::$table);
        $this->add("id", "ValidateID");
        $this->add("category_id", "ValidateID");
        $this->add("title", "ValidateTitle");
        $this->add("meta_desc", "ValidateMD");
        $this->add("meta_key", "ValidateMK");
        $this->add("price", "ValidateName");
        $this->add("code", "ValidateName");
        $this->add("customer", "ValidateName");
        $this->add("serial", "ValidateName");
        $this->add("model", "ValidateName");
        $this->add("contry", "ValidateName");
        $this->add("description", "ValidateName");
        $this->add("composition", "ValidateName");
    }

    protected function postInit() {

        $this->link = URL::get("product", "", array("id" => $this->id));
        return true;
    }
    public static function getAllTable() {
        return ObjectDB::getAll();
    }
    public static function getAllWithImgforHits($product_img_table, $count){
        $query = "SELECT `".Config::DB_PREFIX.self::$table."`.`id`,
		`".Config::DB_PREFIX.self::$table."`.`category_id`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`meta_desc`,
		`".Config::DB_PREFIX.self::$table."`.`meta_key`,
		`".Config::DB_PREFIX.self::$table."`.`price`,
		`".Config::DB_PREFIX.self::$table."`.`code`,
		`".Config::DB_PREFIX.self::$table."`.`customer`,
		`".Config::DB_PREFIX.self::$table."`.`serial`,
		`".Config::DB_PREFIX.self::$table."`.`model`,
		`".Config::DB_PREFIX.self::$table."`.`contry`,
		`".Config::DB_PREFIX.self::$table."`.`description`,
		`".Config::DB_PREFIX.self::$table."`.`composition`,
		`".Config::DB_PREFIX."$product_img_table`.`img` as `image`
		FROM `".Config::DB_PREFIX.self::$table."`
		RIGHT JOIN `".Config::DB_PREFIX."$product_img_table` ON `".Config::DB_PREFIX."$product_img_table`.`product_id` = `".Config::DB_PREFIX.self::$table."`.`id`
		GROUP BY `".Config::DB_PREFIX.self::$table."`.`id` ORDER BY `sold` DESC LIMIT $count";
        $url = new URLPage();
        $result = self::$db->select($query);
        for($i=0; $i < count($result); $i++){
            $result[$i]['image'] = Config::DIR_IMG_PRODUCT.$result[$i]['image'];
            $result[$i]['link'] = URL::get("product", "", array("id" => $result[$i]['id']));
        }
        return $result;
    }
    public static function getAllWithImgRand($product_img_table, $count){
        $query = "SELECT `".Config::DB_PREFIX.self::$table."`.`id`,
		`".Config::DB_PREFIX.self::$table."`.`category_id`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`meta_desc`,
		`".Config::DB_PREFIX.self::$table."`.`meta_key`,
		`".Config::DB_PREFIX.self::$table."`.`price`,
		`".Config::DB_PREFIX.self::$table."`.`code`,
		`".Config::DB_PREFIX.self::$table."`.`customer`,
		`".Config::DB_PREFIX.self::$table."`.`serial`,
		`".Config::DB_PREFIX.self::$table."`.`model`,
		`".Config::DB_PREFIX.self::$table."`.`contry`,
		`".Config::DB_PREFIX.self::$table."`.`description`,
		`".Config::DB_PREFIX.self::$table."`.`composition`,
		`".Config::DB_PREFIX."$product_img_table`.`img` as `image`
		FROM `".Config::DB_PREFIX.self::$table."`
		RIGHT JOIN `".Config::DB_PREFIX."$product_img_table` ON `".Config::DB_PREFIX."$product_img_table`.`product_id` = `".Config::DB_PREFIX.self::$table."`.`id`
		GROUP BY `".Config::DB_PREFIX.self::$table."`.`id` ORDER BY RAND() DESC LIMIT $count";
        $result = self::$db->select($query);
        for($i=0; $i < count($result); $i++){
            $result[$i]['image'] = Config::DIR_IMG_PRODUCT.$result[$i]['image'];
            $result[$i]['link'] = URL::get("product", "", array("id" => $result[$i]['id']));
        }
        return $result;
    }
    private static function getBaseSelect(){
        $select = new Select(self::$db);
        $select->from(self::$table, "*");
        return $select;
    }
    /*public static function getAllonCategoryID($category_id = false, $count = false, $offset = false, $post_handling = false){
        $select = self::getBaseSelect();
        if ($category_id) $select->where("`category_id` = ".self::$db->getSQ(), array($category_id));
        if ($count) $select->limit($count, $offset);
        echo $select;
        $data = self::$db->select($select);
        $products = ObjectDB::buildMultiple(__CLASS__, $data);
        if ($post_handling) foreach ($products as $product) $product->postHandling();
        return $products;
    }*/
    public static function getAllonCategoryID($product_img_table, $category_id = false, $count = false, $offset = false, $order = false, $post_handling = false){
        $query = "SELECT `".Config::DB_PREFIX.self::$table."`.`id`,
		`".Config::DB_PREFIX.self::$table."`.`category_id`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`meta_desc`,
		`".Config::DB_PREFIX.self::$table."`.`meta_key`,
		`".Config::DB_PREFIX.self::$table."`.`price`,
		`".Config::DB_PREFIX.self::$table."`.`code`,
		`".Config::DB_PREFIX.self::$table."`.`customer`,
		`".Config::DB_PREFIX.self::$table."`.`serial`,
		`".Config::DB_PREFIX.self::$table."`.`model`,
		`".Config::DB_PREFIX.self::$table."`.`contry`,
		`".Config::DB_PREFIX.self::$table."`.`description`,
		`".Config::DB_PREFIX.self::$table."`.`composition`,
		`".Config::DB_PREFIX."$product_img_table`.`img` as `image`
		FROM `".Config::DB_PREFIX.self::$table."`
		LEFT JOIN `".Config::DB_PREFIX."$product_img_table` ON `".Config::DB_PREFIX."$product_img_table`.`product_id` = `".Config::DB_PREFIX.self::$table."`.`id`";
        if($category_id) $query .= " WHERE `".Config::DB_PREFIX.self::$table."`.`category_id` = ".$category_id;
		$query .= " GROUP BY `".Config::DB_PREFIX.self::$table."`.`id`";
        if ($order) $query .= " ORDER BY `".Config::DB_PREFIX.self::$table."`.`".$order."`";
		else $query .= " ORDER BY `".Config::DB_PREFIX.self::$table."`.`id`";
        if($count) $query .= " LIMIT $count";
        if($offset) $query .= " OFFSET $offset";
        //print_r($query);
        $result = self::$db->select($query);
        for($i=0; $i < count($result); $i++){
            $result[$i]['image'] = Config::DIR_IMG_PRODUCT.$result[$i]['image'];
            $result[$i]['link'] = URL::get("product", "", array("id" => $result[$i]['id']));
        }
        return $result;
    }

    public static function getRandom($count){
        $select = new Select(self::$db);
        $select->from(self::$table, "*")->limit($count)->rand();
        $data = self::$db->select($select);
        $item = ObjectDB::buildMultiple(__CLASS__, $data);
        return $item;
    }

}


?>