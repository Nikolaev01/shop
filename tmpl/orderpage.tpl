<div class="content">
    <div class="inner_content centrum">
        <div class="fifty left">
           <?=$hornav?>
            <div class="order_fields">
                <form name="order" id="order" method="post" action="javascript:void(null);" onsubmit="call()">
                    <div class="name_prod">
                        <?php include "message.tpl" ?>
                        <h2></h2>
                        <div class="order_field_input">
                            <div class="field_span left">
                                <span>Ваше имя <span class="red">*</span></span>
                            </div>
                            <div class="field_input">
                                <input type="text" name="name" placeholder="Как к Вам обращаться?" value="<?=$name?>">
                            </div>
                            <div class="clear"></div>
                            <div class="field_span left">
                                <span>Телефон <span class="red">*</span></span>
                            </div>
                            <div class="field_input left">
                                <input type="text" name="phone" placeholder="+7 (___) ___-__-__" value="<?=$phone?>">
                            </div>
                            <div class="clear"></div>
                            <div class="field_span left">
                                <span>E-mail <span class="red">*</span></span>
                            </div>
                            <div class="field_input left">
                                <input type="email" name="email" placeholder="Для писем со статусом заказа" value="<?=$email?>">
                            </div>
                            <div class="clear"></div>

                        </div>
                    </div>
                    <div class="shipping_cur">
                        <p>Способ получения заказа</p>
                        <div class="cur_item left">
                            <div class="left">
                                <span><input class="order_brand__input" type="radio" name="delivery" value="sam" <?php if ($delivery == "sam") { ?>checked="checked"<?php } ?>><label>Забрать самому</label></span>
                                <h4>Бесплатно</h4>
                            </div>
                            <div class="right">
                                <img src="/images/samo.png" class="samov" alt="Самовывоз">
                            </div>
                        </div>
                        <div class="cur_item right">
                            <div class="left">
                                <span><input class="order_brand__input" type="radio" name="delivery" value="cur" <?php if ($delivery == "cur") { ?>checked="checked"<?php } ?><?php if ($delivery == "") { ?>checked="checked"<?php } ?>><label>Курьерская доставка</label></span>
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
                                    <input type="radio" class="pay_checkbox__input" name="punkt" value="prt_mir" <?php if ($punkt == "prt_mir") { ?>checked="checked"<?php } ?><?php if ($punkt == "") { ?>checked="checked"<?php } ?>>
                                    <label>м. Проспект мира</label>
                                </div>

                                <p class="blue">Олимпийский проспект, д.16, стр.2, подъезд №5, этаж 3, офис 4032</p>
                                <h4>Время работы</h4>
                                <p>Пн-Пт: с 10:00 до 19:00</p>
                                <p>Сб-Вс: с 10:00 до 18:00</p>
                            </div>
                            <div class="samoviv_item left">
                                <div class="samov_checkbox__label">
                                    <input class="samov_checkbox__input" type="radio" name="punkt" value="olimp" <?php if ($punkt == "olimp") { ?>checked="checked"<?php } ?>>
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
                            <select name="country">
                                <option disabled="">Страна</option>
                                <option value="Россия">Россия</option>
                                <option value="Украина">Украина</option>
                                <option value="Узбекистан">Узбекистан</option>
                            </select>
                        </div>
                        <div class="field_input left">
                            <select name="city">
                                <option disabled="">Город</option>
                                <option value="Москва">Москва</option>
                                <option value="Подольск">Подольск</option>
                                <option value="Щербинка">Щербинка</option>
                            </select>
                        </div>
                        <div class="field_input left">
                            <input type="text" name="index" placeholder="Индекс" value="<?=$index?>">
                        </div>
                        <div class="field_input left">
                            <input type="text" name="addres" placeholder="Адрес(улица, дом, квартира)" value="<?=$addres?>">
                        </div>

                    </div>
                    <div class="comment">
                        <span id="comment">Добавить комментарий</span>
                        <textarea name="comment"><?=$comment?></textarea>
                    </div>
                    <div class="pay">
                        <p>Оплата</p>
                        <div class="pay_checkbox">
                            <div class="pay_checkbox__label">
                                <input type="radio" id="shipping_pay" class="pay_checkbox__input" name="shipping_pay" value="online" <?php if ($shipping == "online") { ?>checked="checked"<?php } ?><?php if ($shipping == "") { ?>checked="checked"<?php } ?>>
                                <label>Оплата онлайн</label>
                            </div>
                        </div>
                        <div class="pay_checkbox">
                            <div class="pay_checkbox__label">
                                <input type="radio" class="pay_checkbox__input" name="shipping_pay" value="nalich">
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
                    <input type="hidden" name="func" value="order" />
                    <input type="submit" name="submit" value="Заказ подтверждаю">
                </form>
            </div>
        </div>
    </div>

</div>