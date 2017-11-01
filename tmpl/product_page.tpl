<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?=$hornav?>
            </div>
            <div class="product_info_img col-sm-6">
                <div class="big_img">
                    <h2 class="visible-xs"><?=$products->title?></h2>
                    <img src="/images/product/product_big_img.png" alt="<?=$products->title?>">
                </div>
                <div class="small_images">
                    <div class="row">
                        <?php foreach ($images as $item) { ?>
                        <div class="col-xs-3">
                            <div class="row">
                                <div class="small_images_item">
                                    <img src="<?=$item->img?>" alt="<?=$products->title?>">
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="product_info_features col-sm-6">
                <h2 class="hidden-xs"><?=$products->title?></h2>
                <div class="product_price">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6 product_price_info">
                            <div>
                                <h1><?=$products->price?> <img src="<?=Config::DIR_IMG ?>coast_red_big.png" alt="Стоимость"> </h1>
                                <span v="<?=$link_addcart?>" class="price_lable"><img src="<?=Config::DIR_IMG ?>cart_white.png"  alt="В корзину">В корзину</span><br>
                                <!--<a href="<?=$link_addcart?>" class="price_lable"><img src="<?=Config::DIR_IMG ?>cart_white.png" alt="В корзину">В корзину</a><br>-->
                                <a href="<?=$link_compare?>" class="comparison"><img src="<?=Config::DIR_IMG ?>strelk.png" alt="Добавить к сравнению">Добавить к сравнению</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-pull-6 product_price_info">
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
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#home" data-toggle="tab">Характеристики</a></li>
                                <li><a href="#profile" data-toggle="tab">Состав поставки</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <?=$option?>
                                </div>
                                <div class="tab-pane" id="profile">
                                    Здесь состав поставки
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
