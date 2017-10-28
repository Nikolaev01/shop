<div class="hits">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="name_prod">
                    <span>Хиты продаж</span>
                    <span class="s_left"></span>
                    <span class="s_right"></span>
                </div>
                <div class="row line_prod">
                    <?php foreach ($hit as $item) { ?>
                        <div class="col-md-3 col-sm-4 col-xs-6 product_cart">
                        <div class="views-rows line">
                            <div class="col-md-12">
                                <span class="sale_item">Sale</span>
                                <a href="<?=$item["link"]?>" class="img_new"><img src="<?=$item["image"]?>" alt="<?=$item['title']?>"/></a>
                                <a href="<?=$item["link"]?>" class="product_name"><p><?=$item["title"]?></p></a>
                                <div class="inner_pro_inf">
                                    <div>
                                        <span>Артикул: <?=$item["code"]?></span>
                                        <a href="<?=$link_compare?>"><img src="<?=$part_images?>strelk.png" alt="Сравнение"/>Сравнение</a>

                                    </div>

                                    <div>
                                        <span><?=$item['price']?> <img src="<?=$part_images?>coast.png" alt="Стоимость"/> </span>
                                        <br />
                                        <span v="<?=$item["link_add_cart"]?>" data-target="#myModal"><img src="<?=$part_images?>cart_small.png" alt="В корзину">В корзину</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>