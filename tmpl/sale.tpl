<div class="hits">
    <div class="inner_hits">
        <div class="name_prod">
            <span><?=$name?></span>
            <span class="s_left"></span>
            <span class="s_right"></span>
        </div>
        <div class="line_prod">

            <?php foreach ($sal as $item) { ?>
                <div class="product_cart">
                    <span class="hits_item">Sale</span>
                    <a href="<?=$item["link"]?>" class="img_new"><img src="<?=$item['image']?>" alt="<?=$item['title']?>"></a>
                    <a href="<?=$item["link"]?>" class="product_name"><p><?=$item['title']?></p></a>
                    <div class="inner_pro_inf">
                        <div>
                            <span>Артикул: <?=$item['code']?></span>
                            <a href="<?=$link_compare?>"><img src="<?=$part_images?>strelk.png" alt="Сравнение">Сравнение</a>
                        </div>
                        <div>
                            <span><?=$item['price']?><img src="<?=$part_images?>coast.png" alt="Стоимость"></span>
                            <br>
                            <a href="<?=$link_addcart?>"><img src="<?=$part_images?>cart_small.png" alt="В корзину">В корзину</a>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>