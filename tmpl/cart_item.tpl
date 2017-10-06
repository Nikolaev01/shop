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
    <a href="#"> <img src="/images/product.png" class="cart_img" alt="Название товара"></a>
    <a href="#" class="product_name">
    <p>Ванна акриловая Aquatec Ума 145x145 см</p>
    </a>
    <span>Артикул: 34427</span>
    </div>
    <div class="right">
    <div class="cart_item">
    <span>1090 <img src="/images/coast.png" alt="Стоимость"></span>
    </div>
    <div class="cart_item">
    <span class="add_item">-</span>
    <span class="add_item count">1</span>
    <span class="add_item">+</span>
    </div>
    <div class="cart_item">
    <span>1090 <img src="/images/coast.png" alt="Стоимость"></span><br>
    <input type="checkbox" name="mont">
    </div>
    <div class="cart_item">
    <a href=""><img src="/images/close.png" alt="Монтаж"></a>
    </div>
    </div>
    </div>
</div>
    <?php }?>

</div>