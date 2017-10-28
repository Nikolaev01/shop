<!DOCTYPE html>
<html lang="ru">
<?=$header?>
<body>
<div id="container">
    <header>
        <div id="top">
            <div class="container">
                <div class="row top10">
                    <div class="col-md-3 col-xs-4">
                        <img src="/images/place.png" alt="Местоположение" />
                        <span class="hidden-xs">Ваш город: </span>
                        <a href="#">Москва</a>
                    </div>
                    <div class="col-md-4 col-md-offset-5 col-xs-8 text-right">
                        <div class="pull-right">
                            <img src="/images/strelk.png" class="img_top" alt="Сравнение товаров" />
                            <a href="#">Сравнение</a>
                            <img src="/images/man.png" class="img_top" alt="Личный кабинет" />
                            <a href="#" class="hidden-xs">Личный кабинет</a>
                            <a href="#" class="visible-xs-inline-block">Кабинет</a>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div id="logo">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div id="logotip">
                            <img src="images/logo.png" alt="Интернет магазин сантехники" />
                            <p>Специализированный магазин сантехники</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-9">
                        <div id="phone">
                            <img src="images/clock.png" alt="Время работы" />
                            <p>пн-вс с 9:00 до 20:00</p>
                            <h3>8 (495)-111-11-11</h3>
                            <a href="#">Заказать звонок</a>
                        </div>
                    </div>
                    <?=$cart?>
                </div>
            </div>
        </div>
    </header>
    <div id="top_menu">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?=$top?>
            </div><!-- /.container-fluid -->
        </nav>

    </div>
    <?=$center?>
    <footer>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div id="logo_footer" class="left">
                            <img src="images/logo_buttom.gif" alt="Логотип" />
                            <p>&copy;nd-shop.ru, 2017г.</p>
                            <a href="#"><p>email@email.ru</p></a>
                            <a href="#"><img src="images/vk.png" alt="Вконтакте" /></a><a href="#"><img src="images/facebook.png" alt="Facebook" /></a>
                            <a href="#"><img src="images/twiter.png" alt="Twiter" /></a>

                        </div>
                    </div>
                    <div class="col-sm-4 hidden-xs">
                        <div id="ul_mag" class="left">
                            <h4>Интернет-магазин</h4>
                            <?=$bottom?>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div id="ul_inf">
                            <h4>Информация</h4>
                            <ul>
                                <li>
                                    <a href="#">
                                        Условия доставки
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Оплата товара
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Получение и возврат товара
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModal">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">

                    <img class="img_modal" src="/images/success.png" alt="Успрешно">
                    <h4 class="modal-title" id="myLargeModalLabel">Товар успешно добавлен в корзину!</h4>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>