<div class="center_33 right">
        <div class="shipping">
            <div class="prormo">
                <h4>Сумма заказа</h4>
                <input type="text" name="promo" placeholder="Введине промо-код" value="<?=$discount?>">
                <input type="submit" value="Применить" />
            </div>
            <div class="price left">
                <div class="inner_price">
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Стоимость:</span>
                        </div>
                        <div class="coast_span right">
                            <span><?=$summa?></span><img src="/images/coast_black.png" alt="Стоимость">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Монтаж:</span>
                        </div>
                        <div class="coast_span right">
                            <span>0</span><img src="/images/coast_black.png" alt="Стоимость">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <span>Скидка:</span>
                        </div>
                        <div class="coast_span right">
                            <span><?=$price_discount?></span><img src="/images/coast_black.png" alt="Стоимость">
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="coast">
                        <div class="coast_span left">
                            <h4>Итого:</h4>
                        </div>
                        <div class="coast_span right">
                            <span class="red"><?=$summa?></span><img src="/images/coast.png" alt="Стоимость">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
            <div class="clear"></div>
            <div class="submit">
                <input type="hidden" name="func" value="cart" />
                <a href="<?=$link_pageorder?>">Оформить заказ</a>
            </div>
        </div>
</div>