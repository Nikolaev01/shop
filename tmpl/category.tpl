<div class="categories">
<?=$category_block?>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 filter">
                <form method="post" action="#" name="order_form">
                    <div class="order">
                        <div class="row">
                            <div class="order_coast col-xs-12 col-sm-4 col-md-12">
                                <div class="order_coast title">
                                    <h4>Стоимость</h4><span class="arr_up"></span>
                                </div>
                                <div class="clear"></div>
                                <div class="order_coast value">
                                    <span>от</span>
                                    <input type="text" value="0" />
                                    <span>до</span>
                                    <input type="text" value="1803"/>
                                    <span>руб.</span>
                                </div>
                            </div>
                            <div class="order_brand col-xs-12 col-sm-8 col-md-12">
                                <div class="row">
                                    <div class="order_brand title col-sm-12">
                                        <h4>Брэнд</h4><span class="arr_up"></span>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-xs-3 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" />
                                            <label>SW</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" />
                                            <label>Embory</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" /><label>Acalya</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" /><label>RS</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_made col-xs-12 col-sm-6 col-md-12">
                                <div class="row">
                                    <div class="order_made title col-sm-12">
                                        <h4>Изделие</h4><span class="arr_up"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-xs-6 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" /><label>Унитаз<span class="order_price">(1232)</span></label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" /><label>Инстоляция<span class="order_price">(1232)</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_type col-xs-12 col-sm-6 col-md-12">
                                <div class="row">
                                    <div class="order_type title col-sm-12">
                                        <h4>Безободковый</h4><span class="arr_up"></span>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-xs-6 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" /><label>Унитаз<span class="order_price">(1232)</span></label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-12">
                                        <div class="order_brand__label">
                                            <input class="order_brand__input" type="radio" /><label>Инстоляция<span class="order_price">(1232)</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <div class="order_button_reset left"><input type="button" value="Очистить" /></div>
                                <div class="order_button_submit left"><input type="submit" value="Обновить" /></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-9">
                <div class="center">
                    <?=$hornav?>
                    <?=$sort?>
                    <div class="hits">
                        <div class="row">
                            <div class="col-md-12">
                                <?=$product?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>