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
            $result[$i]['link_add_cart'] = URLPage::getLinkAddCart($result[$i]['id']);
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
    public static function getAllonCategoryID($product_img_table, $category_id = false, $count = false, $offset = false, $order = false, $desc = false){
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
		if($desc == "down") $query .= " DESC";
        if($count) $query .= " LIMIT $count";
        if($offset) $query .= " OFFSET $offset";
        $result = self::$db->select($query);
        for($i=0; $i < count($result); $i++){
            $result[$i]['image'] = Config::DIR_IMG_PRODUCT.$result[$i]['image'];
            $result[$i]['link'] = URL::get("product", "", array("id" => $result[$i]['id']));
            $result[$i]['link_add_cart'] = URLPage::getLinkAddCart($result[$i]['id']);
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
    public static function getPriceOnIDs($ids){
        $products = self::getAllOnIDs($ids);
        $result = array();
        if($ids[0] == 0) $summa = 0;
        else {
            for ($i = 0; $i < count($products); $i++) {
                $result[$products[$i]["id"]] = $products[$i]["price"];
            }
            $summa = 0;
            for ($i = 0; $i < count($ids); $i++) {
                $summa += $result[$ids[$i]];

            }
        }
        return $summa;
    }
    public static function getTableName(){
        return self::$table;
    }
    public static function getAllOnProductIDsWithIMG($product_img_table, $ids){
        $query = "SELECT `".Config::DB_PREFIX.self::$table."`.`id`,
		`".Config::DB_PREFIX.self::$table."`.`title`,
		`".Config::DB_PREFIX.self::$table."`.`price`,
		`".Config::DB_PREFIX.self::$table."`.`inst_price`,
		`".Config::DB_PREFIX.self::$table."`.`code`,
		`".Config::DB_PREFIX.self::$table."`.`serial`,
		`".Config::DB_PREFIX."$product_img_table`.`img` as `image`
		FROM `".Config::DB_PREFIX.self::$table."`
		LEFT JOIN `".Config::DB_PREFIX."$product_img_table` ON `".Config::DB_PREFIX."$product_img_table`.`product_id` = `".Config::DB_PREFIX.self::$table."`.`id`";
        if($ids) {
            $query .= " WHERE `xcv_product`.`id` IN (";
            for ($i = 0; $i < count($ids); $i++) {
                $query .= "'". $ids[$i] ."',";
            }
            $query = substr($query, 0, -1);
            $query .= ")";
        }
        $query .= " GROUP BY `".Config::DB_PREFIX.self::$table."`.`id`";
        $result = self::$db->select($query);
        for($i=0; $i < count($result); $i++){
            $result[$i]['image'] = Config::DIR_IMG_PRODUCT.$result[$i]['image'];
            $result[$i]['link'] = URL::get("product", "", array("id" => $result[$i]['id']));
            //print_r($result[$i]['price']);
            $result[$i]['delete_cart'] = URLPage::getLinkDelCart($result[$i]['id']);

        }
        return $result;
    }
    public static function getAllOptionFromProduct($product_id, $option_table, $option_value_table, $product_option_value_table){
        $query = $query = "SELECT `".Config::DB_PREFIX.$product_option_value_table."`.`product_id`,
		`".Config::DB_PREFIX.$option_table."`.`option_name`,
		`".Config::DB_PREFIX.$option_value_table."`.`name`
		FROM `".Config::DB_PREFIX.$product_option_value_table."`
		LEFT JOIN `".Config::DB_PREFIX.$option_table."` ON `".Config::DB_PREFIX.$product_option_value_table."`.`option_id` = `".Config::DB_PREFIX.$option_table."`.`option_id`";
        $query .= " LEFT JOIN `".Config::DB_PREFIX.$option_value_table."` ON `".Config::DB_PREFIX.$product_option_value_table."`.`option_value_id` = `".Config::DB_PREFIX.$option_value_table."`.`option_value_id`";
        $query .= " WHERE `".Config::DB_PREFIX.$product_option_value_table."`.`product_id`='".$product_id."'";
        $query .= "  GROUP BY `".Config::DB_PREFIX.$option_table."`.`option_id`";
        $result = self::$db->select($query);
        return $result;
        //print_r($result);
        /*SELECT xcv_product_option_value.product_id, xcv_option.option_name, xcv_option_value.name
        FROM xcv_product_option_value
        LEFT JOIN xcv_option on (xcv_product_option_value.option_id=xcv_option.option_id)
        LEFT JOIN xcv_option_value on (xcv_product_option_value.option_value_id=xcv_option_value.option_value_id)
        WHERE xcv_product_option_value.product_id=2
        GROUP BY xcv_option.option_id*/
    }

    public static function getAllOnIDs($ids){
        if (!$ids)return false;
        $query_ids = "";
        $params = array();
        for ($i = 0; $i < count($ids); $i++) {
            $query_ids .= Config::DB_SYM_QUERY.",";
            $params[] = $ids[$i];
        }
        $query_ids = substr($query_ids, 0 ,-1);
        $query = "SELECT * FROM `".Config::DB_PREFIX.self::$table."` WHERE `id` IN ($query_ids)";
        $query = self::$db->getQuery($query, $params);
        //print_r($query);
        return self::$db->select($query);
    }

    public function addValues($values){
        return self::$db->insert(Config::DB_PREFIX.self::$table, $values);
    }
}
?>