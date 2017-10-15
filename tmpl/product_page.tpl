<div class="content">
    <div class="inner_content centrum">
        <?=$hornav?>
    <div class="product_info">
        <div class="product_info_img left">
            <div class="big_img">
                <img src="/images/product/product_big_img.png" alt="Наименование товара">
            </div>
            <div class="small_images">
                <?php foreach ($images as $item) { ?>
                    <div class="small_images_item">
                        <img src="<?=$item->img?>" alt="<?=$products->title?>">
                    </div>
                <?php } ?>

            </div>
        </div>
        <div class="product_info_features right">
            <h2><?=$products->title?></h2>
            <div class="product_price">
                <div class="product_price_info left">
                    <div class="inner_price">
                        <div class="coast">
                            <div class="coast_span left">
                                <span>Код товара:</span>
                            </div>
                            <div class="coast_span right">
                                <span><?=$products->code?></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="coast">
                            <div class="coast_span left">
                                <span>Производство</span>
                            </div>
                            <div class="coast_span right">
                                <span><?=$products->customer?></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="coast">
                            <div class="coast_span left">
                                <span>Серия:</span>
                            </div>
                            <div class="coast_span right">
                                <span><?=$products->serial?></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="coast">
                            <div class="coast_span left">
                                <span>Модель:</span>
                            </div>
                            <div class="coast_span right">
                                <span><?=$products->model?></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="coast">
                            <div class="coast_span left">
                                <span>Страна:</span>
                            </div>
                            <div class="coast_span right">
                                <span class="red"><?=$products->contry?></span>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="product_price_info right">
                    <div>
                        <h1><?=$products->price?> <img src="<?=Config::DIR_IMG ?>coast_red_big.png" alt="Стоимость"> </h1>
                        <span v="<?=$link_addcart?>" class="price_lable"><img src="<?=Config::DIR_IMG ?>cart_white.png"  alt="В корзину">В корзину</span><br>
                        <!--<a href="<?=$link_addcart?>" class="price_lable"><img src="<?=Config::DIR_IMG ?>cart_white.png" alt="В корзину">В корзину</a><br>-->
                        <a href="<?=$link_compare?>" class="comparison"><img src="<?=Config::DIR_IMG ?>strelk.png" alt="Добавить к сравнению">Добавить к сравнению</a>
                    </div>
                </div>
                <div class="clear"></div>
                <?=$option?>
                <!--<div class="product_feature_inner">
                    <a class="product_info_active" href="#">Характеристики</a>
                    <a href="#">Состав поставки</a>
                </div>
                <div class="inner_price">
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Артикул:</span>
                        </div>
                        <div class="coast_span right">
                            <span>ES-L100CR</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Тип:</span>
                        </div>
                        <div class="coast_span right">
                            <span>Кабина</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Управление:</span>
                        </div>
                        <div class="coast_span right">
                            <span>Электронное</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Вид:</span>
                        </div>
                        <div class="coast_span right">
                            <span>средний</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Высота поддона, см:</span>
                        </div>
                        <div class="coast_span right">
                            <span class="red">15</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Материал:</span>
                        </div>
                        <div class="coast_span right">
                            <span>акрил</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Ширина, см:</span>
                        </div>
                        <div class="coast_span right">
                            <span>100</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Глубина, см:</span>
                        </div>
                        <div class="coast_span right">
                            <span>100</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Высота, см:</span>
                        </div>
                        <div class="coast_span right">
                            <span>100</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Глубина поддона, см:</span>
                        </div>
                        <div class="coast_span right">
                            <span>100</span>
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>-->
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
</div>
