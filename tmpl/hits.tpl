<div class="hits">
    <div class="inner_hits">
        <div class="name_prod">
            <span>Хиты продаж</span>
            <span class="s_left"></span>
            <span class="s_right"></span>
        </div>
        <div class="line_prod">
            <?php foreach ($hit as $item) { ?>
                <div class="product_cart">
                    <span class="sale_item">Sale</span>
                    <a href="<?=$item["link"]?>" class="img_new"><img src="<?=$item["image"]?>" alt="<?=$item['title']?>"></a>
                    <a href="<?=$item["link"]?>" class="product_name"><p><?=$item["title"]?></p></a>
                    <div class="inner_pro_inf">
                        <div>
                            <span>Артикул: <?=$item["code"]?></span>
                            <a href="<?=$link_compare?>"><img src="<?=$part_images?>strelk.png" alt="Сравнение">Сравнение</a>
                        </div>
                        <div>
                            <span><?=$item['price']?> <img src="<?=$part_images?>coast.png" alt="Стоимость"> </span>
                            <br>
                            <span v="<?=$item["link_add_cart"]?>"><img src="<?=$part_images?>cart_small.png" alt="В корзину">В корзину</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>