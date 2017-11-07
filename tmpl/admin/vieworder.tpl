<div class="orders-view">
<?php print_r($product_ids); ?>
    <h1>Заказ</h1>

    <p>
        <a class="btn btn-primary" href="<?=$link_update?>">Изменить</a><a class="btn btn-danger" href="<?=$link_delete?>" data-confirm="Are you sure you want to delete this item?" data-method="post">Удалить</a>    </p>

    <table id="w0" class="table table-striped table-bordered detail-view">
        <tbody>
        <tr><th>ID</th><td><?=$id?></td></tr>
        <tr><th>Способ доставки</th><td><?=$delivery?></td></tr>
        <tr><th>ID Продуктов</th><td><?=$product_ids?></td></tr>
        <tr><th>Стоимость</th><td><?=$price?></td></tr>
        <tr><th>Имя</th><td><?=$name?></td></tr>
        <tr><th>Телефон</th><td><?=$phone?></td></tr>
        <tr><th>Email</th><td><a href="mailto:w4eyguio@wef.ruy"><?=$email?></a></td></tr>
        <tr><th>Адресс</th><td><?=$address?></td></tr>
        <tr><th>Коментарий к заказу</th><td><?=$notice?></td></tr>
        <tr><th>Дата заказа</th><td><?=$date_order?></td></tr>
        <tr><th>Дата отправки</th><td><?=$date_send?></td></tr>
        <tr><th>Дата оплаты</th><td><?=$date_pay?></td></tr>
        <tr><th>ID продуктов под инсталяцию</th><td><?=$product_ids_inst?></td></tr>
        <tr><th>Статус</th><td><?=$status?></td></tr>
        </tbody>
    </table>
</div>