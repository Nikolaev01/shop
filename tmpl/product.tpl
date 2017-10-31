<div class="row">
    <?php foreach ($product as $item) { ?>
        <div class="col-md-4 col-sm-4 col-xs-6 product_cart">
            <div class="views-rows line margin-top">
                <div class="col-md-12">
                    <span class="sale_item">Sale</span>
                    <a href="<?=$item['link']?>" class="img_new"><img src="<?=$item['image']?>" alt="<?=$item['title']?>"/></a>
                    <a href="<?=$item['link']?>" class="product_name"><p><?=$item['title']?></p></a>
                    <div class="inner_pro_inf">
                        <div>
                            <span class="small-hide">Артикул: <?=$item['code']?></span>
                            <a href="#" class="small-hide"><img src="/images/strelk.png" alt="Сравнение"/>Сравнение</a>
                            <a href="#" class="small-show"><img src="/images/strelk.png" alt="Сравнение"/></a>

                        </div>
                        <div>
                            <span><?=$item['price']?> <img src="/images/coast.png" alt="Стоимость"/> </span>
                            <br />
                            <span v="<?=$item["link_add_cart"]?>" class="small-hide"><img src="/images/cart_small.png" alt="Картинка">В корзину</span>
                            <span v="<?=$item["link_add_cart"]?>" class="small-show"><img src="/images/cart_small.png" alt="Картинка"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?=$pagination?>