<div class="sort">
    <div class="name_prod">
        <span><?=$category_name?></span>
    </div>
    <div class="sort_link">
        <span>Сортировка:</span>
        <a href="<?=$link_sale?>" <?php if($request == "discount") {?>class="active"<? }?>>Скидка</a>
        <a href="#">Рейтинг</a>
        <a href="<?=$link_price?>" <?php if($request == "price") {?>class="active"<? }?>>Цена</a>
        <a href="<?=$link_down?>" <?php if($request_up == "down") {?>class="active"<? }?>><img src="/images/arr_down.png" alt="Сортировка по убыванию"></a>
        <a href="<?=$link_up?>" <?php if($request_up == "up") {?>class="active"<? }?>><img src="/images/arr_up.png" alt="Сортировка по возврастанию"></a>
    </div>
</div>