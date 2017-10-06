<div class="center_33 right">
        <div class="shipping">
            <div class="shipping_cur">
                <h4>Способ получения заказа</h4>
                <div class="cur_item">
                    <div class="left">
                        <span><input class="order_brand__input" type="radio"><label>Забрать самому</label></span>
                        <h4>Бесплатно</h4>
                    </div>
                    <div class="right">
                        <img src="/images/samo.png" class="samov" alt="Самовывоз">
                    </div>
                </div>
                <div class="cur_item">
                    <div class="left">
                        <span><input class="order_brand__input" type="radio"><label>Курьерская доставка</label></span>
                        <h4>500 <img src="/images/coast_black.png" alt="Рубль"> </h4>
                    </div>
                    <div class="right">
                        <img src="/images/curier.png" alt="Курьерская доставка">
                    </div>
                </div>
            </div>
            <div class="prormo">
                <input type="text" name="promo" placeholder="Введине промо-код" value="<?=$discount?>">
                <input type="submit" value="Применить" />
                <!--<a href="#">Применить</a>-->

            </div>
            <div class="price left">
                <h4>Итого:</h4>
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
                            <span>Доставка:</span>
                        </div>
                        <div class="coast_span right">
                            <span>0</span><img src="/images/coast_black.png" alt="Стоимость">
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
                            <h4>Всего к оплате:</h4>
                        </div>
                        <div class="coast_span right">
                            <span class="red">2373</span><img src="/images/coast.png" alt="Стоимость">
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
            <div class="clear"></div>
            <div class="submit">
                <input type="hidden" name="func" value="cart" />
                <input type="submit" name="submit" value="Оформить заказ">
            </div>
        </div>
</div>