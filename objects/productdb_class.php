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
        $this->img = Config::DIR_IMG.$this->img;
        $product_img = new ProductImgDB();
        $product_img->load($this->id);
        $this->product_img = $product_img;
        return true;
    }
    public static function getAllTable() {
        return ObjectDB::getAll();
    }
    public static function getAllWithImgforHits($product_img_table){
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
		LEFT JOIN `".Config::DB_PREFIX."$product_img_table` ON `".Config::DB_PREFIX."$product_img_table`.`product_id` = `".Config::DB_PREFIX.self::$table."`.`id`
		ORDER BY `sold` DESC";
        $result = self::$db->select($query);
        for($i=0; $i < count($result); $i++){
            $result[$i]['image'] = Config::DIR_IMG_PRODUCT.$result[$i]['image'];
        }
        return $result;
    }
    private static function getBaseSelect(){
        $select = new Select(self::$db);
        $select->from(self::$table, "*");
        return $select;
    }

}


?>