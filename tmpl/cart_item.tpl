<div class="sort">
    <div class="name_prod">
        <span><?=$page_name?></span>
    </div>
</div>
<div class="center_66 left">
    <?php if (count($cart_items) == 0) {?>
    <div class="cart">
    <p>Корзина пуста</p>
    </div>

    <?php }?>
    <?php if (!count($cart_items) == 0) { ?>
    <div class="cart">
    <div class="cart_field name">
        <div class="left">
        </div>
        <div class="right">
        <div class="cart_item"><span>Стоимость</span></div>
        <div class="cart_item"><span>Количество</span></div>
        <div class="cart_item"><span>Монтаж</span></div>
        <div class="cart_item"><span>Удалить</span></div>
        </div>
    </div>
        <?php foreach ($cart_items as $item) { ?>
        <div class="cart_field item">
        <div class="left">
                <a href="<?=$item['link']?>"> <img src="<?=$item['image']?>" class="cart_img" alt="<?=$item['title']?>"></a>
                <a href="<?=$item['link']?>" class="product_name">
                    <p><?=$item['title']?></p>
                </a>
                <span>Артикул: <?=$item['code']?></span>
            </div>
        <div class="right">
            <div class="cart_item">
                <span><?=$item['price']?> <img src="/images/coast.png" alt="Стоимость"></span>
            </div>
        <div class="cart_item">
           <input type="hidden" name="count_<?=$item['id']?>" value="<?=$item['count']?>" />
            <span class="add_item minus">-</span>
           <span class="add_item count"><?=$item['count']?></span>
            <span class="add_item">+</span>
        </div>
        <div class="cart_item">
            <?php if ($item['inst_price'] !== "0") { ?>
            <span><?=$item['inst_price']?> <img src="/images/coast.png" alt="Стоимость"></span><br>
            <input type="checkbox" name="mont">
            <?php } ?>
        </div>
        <div class="cart_item">
            <a href="<?=$item['delete_cart']?>"><img src="/images/close.png" alt="Монтаж"></a>
        </div>
        </div>
        </div>
        <?php }?>
    </div>
    </div>
    <?php }?>
