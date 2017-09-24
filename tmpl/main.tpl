<!DOCTYPE html>
<html lang="ru">
<?=$header?>
<body>
<div id="container">
    <header>
        <div id="top">
            <div id="inner_top">
                <div class="left">
                    <img src="/images/place.png" alt="Местоположение">
                    <p>Ваш город: </p><a href="#">Москва</a>
                </div>
                <div class="right">
                    <img src="/images/strelk.png" alt="Сравнение товаров">
                    <a href="#">Сравнение</a>
                    <img src="/images/man.png" alt="Личный кабинет">
                    <a href="#">Личный кабинет</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div id="logo">
            <div id="inner_logo">
                <div class="left" id="logotip">
                    <img src="images/logo.png" alt="Интернет магазин сантехники">
                    <p>Специализированный магазин сантехники</p>
                </div>
                <div class="left" id="phone">
                    <img src="images/clock.png" alt="Время работы">
                    <p>пн-вс с 9:00 до 20:00</p>
                    <h2>8 (495)-111-11-11</h2>
                    <a href="#">Заказать звонок</a>
                </div>
                <div class="right">
                    <div class="left">
                        <img src="images/cart.png" alt="Корзина покупак">
                        <span>2</span>
                    </div>
                    <div class="right">
                        <a href="#">Корзина</a><br>
                        <p>2 000 <img src="images/coast_silver.png" alt="Корзина"></p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>
    <div id="top_menu">
        <div id="top_menu_inner">
            <?=$top?>
            <div id="search" class="right">
                <form action="#" method="post">
                    <input type="text" placeholder="Что-то ищете?">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?=$center?>
    <footer>
        <div id="footer">
            <div id="inner_footer">
                <div id="logo_footer" class="left">
                    <img src="images/logo_buttom.gif" alt="Логотип">
                    <p>©nd-shop.ru, 2017г.</p>
                    <a href="#"><p>email@email.ru</p></a>
                    <a href="#"><img src="images/vk.png" alt="Вконтакте"></a><a href="#"><img src="images/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="images/twiter.png" alt="Twiter"></a>

                </div>
                <div id="ul_mag" class="left">
                    <h4>Интернет-магазин</h4>
                    <?=$bottom?>

                </div>
                <div id="ul_inf" class="right">
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
    </footer>
</div>
</body>
</html>