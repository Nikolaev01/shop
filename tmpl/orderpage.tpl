<div class="content">
    <div class="inner_content centrum">
        <div class="fifty left">
           <?=$hornav?>
            <div class="order_fields">
                <form name="order" method="post" action="#">
                    <div class="name_prod">
                        <h2></h2>
                        <div class="order_field_input">
                            <div class="field_span left">
                                <span>Ваше имя <span class="red">*</span></span>
                            </div>
                            <div class="field_input">
                                <input type="text" name="name" placeholder="Как к Вам обращаться?">
                            </div>
                            <div class="clear"></div>
                            <div class="field_span left">
                                <span>Телефон <span class="red">*</span></span>
                            </div>
                            <div class="field_input left">
                                <input type="text" name="phone" placeholder="+7 (___) ___-__-__">
                            </div>
                            <div class="clear"></div>
                            <div class="field_span left">
                                <span>E-mail <span class="red">*</span></span>
                            </div>
                            <div class="field_input left">
                                <input type="email" name="email" placeholder="Для писем со статусом заказа">
                            </div>
                            <div class="clear"></div>

                        </div>
                    </div>
                    <div class="shipping_cur">
                        <p>Способ получения заказа</p>
                        <div class="cur_item left">
                            <div class="left">
                                <span><input class="order_brand__input" type="radio"><label>Забрать самому</label></span>
                                <h4>Бесплатно</h4>
                            </div>
                            <div class="right">
                                <img src="/images/samo.png" class="samov" alt="Самовывоз">
                            </div>
                        </div>
                        <div class="cur_item right">
                            <div class="left">
                                <span><input class="order_brand__input" type="radio"><label>Курьерская доставка</label></span>
                            </div>
                            <div class="right">
                                <img src="/images/curier.png" alt="Курьерская доставка">
                            </div>
                        </div>
                    </div>
                    <div class="samo_shipping">
                        <p>Выбирите удобный пункт самовывоза</p>
                        <div class="samoviv">
                            <div class="samoviv_item left">
                                <div class="samov_checkbox__label">
                                    <input type="radio" class="pay_checkbox__input" name="shipping_pay" value="1">
                                    <label>м. Проспект мира</label>
                                </div>

                                <p class="blue">Олимпийский проспект, д.16, стр.2, подъезд №5, этаж 3, офис 4032</p>
                                <h4>Время работы</h4>
                                <p>Пн-Пт: с 10:00 до 19:00</p>
                                <p>Сб-Вс: с 10:00 до 18:00</p>
                            </div>
                            <div class="samoviv_item left">
                                <div class="samov_checkbox__label">
                                    <input class="samov_checkbox__input" type="radio">
                                    <label>м.Проспект Мира</label>
                                </div>

                                <p class="blue">Олимпийский проспект, д.16, стр.2, подъезд №5, этаж 3, офис 4032</p>
                                <h4>Время работы</h4>
                                <p>Пн-Пт: с 10:00 до 19:00</p>
                                <p>Сб-Вс: с 10:00 до 18:00</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="ship">
                        <p>Доставка</p>
                        <div class="field_input left">
                            <select>
                                <option disabled="">Страна</option>
                                <option value="punkt2">Пункт 2</option>
                                <option value="punkt2">Пункт 2</option>
                                <option value="punkt2">Пункт 2</option>
                            </select>
                        </div>
                        <div class="field_input left">
                            <select>
                                <option disabled="">Город</option>
                                <option value="punkt2">Пункт 2</option>
                                <option value="punkt2">Пункт 2</option>
                                <option value="punkt2">Пункт 2</option>
                            </select>
                        </div>
                        <div class="field_input left">
                            <input type="text" name="index" placeholder="Индекс">
                        </div>
                        <div class="field_input left">
                            <input type="text" name="addres" placeholder="Адрес(улица, дом, квартира)">
                        </div>

                    </div>
                    <div class="comment">
                        <span id="comment">Добавить комментарий</span>
                        <textarea name="comment"></textarea>
                    </div>
                    <div class="pay">
                        <p>Оплата</p>
                        <div class="pay_checkbox">
                            <div class="pay_checkbox__label">
                                <input type="radio" id="shipping_pay" class="pay_checkbox__input" name="shipping_pay" value="1">
                                <label>Оплата онлайн</label>
                            </div>
                        </div>
                        <div class="pay_checkbox">
                            <div class="pay_checkbox__label">
                                <input type="radio" class="pay_checkbox__input" name="shipping_pay" value="1">
                                <label>Оплата при получении</label>
                            </div>
                        </div>
                    </div>


                    <!--<div class="sort_link">
                        <span>Сортировка:</span>
                        <a href="#" class="active">Скидка</a>
                        <a href="#">Рейтинг</a>
                        <a href="#">Цена</a>
                        <a href="#"><img src="/images/arr_up.gif" alt="Сортировка по убыванию"></a>
                        <a href="#"><img src="/images/arr_up.gif" alt="Сортировка по возврастанию"></a>

                    </div>-->
                    <input type="submit" name="submit" value="Заказ подтверждаю">
                </form>
            </div>
        </div>
    </div>

</div>