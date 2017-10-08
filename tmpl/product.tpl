<div id="line_prod">
    <?php foreach ($product as $item) { ?>
        <div class="product_cart triple">
            <a href="<?=$item['link']?>" class="img_new"><img src="<?=$item['image']?>" alt="<?=$item['title']?>"></a>
                <div class="item_title"><a href="<?=$item['link']?>" class="product_name"><p><?=$item['title']?></p></a>
                </div>
            <div class="inner_pro_inf">
                <div>
                    <span>Артикул: <?=$item['code']?></span>
                    <a href="#"><img src="/images/strelk.png" alt="Картинка">Сравнение</a>
                </div>
                <div>
                    <span><?=$item['price']?> <img src="/images/coast.png" alt="Картинка"> </span>
                    <br>
                    <span v="<?=$item["link_add_cart"]?>"><img src="/images/cart_small.png" alt="Картинка">В корзину</span>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?=$pagination?>