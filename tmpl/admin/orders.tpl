<div class="orders-index">

    <h1>Заказы</h1>

    <p>
        <a class="btn btn-success" href="<?=$create_order?>">Создать заказ</a>
    </p>
    <div id="w0" class="grid-view">
    <div class="summary">Показанно <b>1-11</b> из <b>11</b> items.</div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr><th>#</th>
            <th><a href="/orders/index?sort=id" data-sort="id">ID</a></th>
            <th><a href="/orders/index?sort=delivery" data-sort="delivery">Способ доставки</a></th>
            <th><a href="/orders/index?sort=product_ids" data-sort="product_ids">ID Продуктов</a></th>
            <th><a href="/orders/index?sort=price" data-sort="price">Стоимость</a></th>
            <th><a href="/orders/index?sort=name" data-sort="name">Имя</a></th>
            <th><a href="/orders/index?sort=name" data-sort="name">Телефон</a></th>
            <th><a href="/orders/index?sort=name" data-sort="name">E-mail</a></th>
            <th><a href="/orders/index?sort=name" data-sort="name">Адрес</a></th>
            <th><a href="/orders/index?sort=name" data-sort="name">Статус</a></th>
            <th class="action-column">&nbsp;</th></tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $item) { ?>
                <tr data-key="140">
                    <td><?=$item->number?></td>
                    <td><?=$item->id?></td>
                    <td><?=$item->delivery?></td>
                    <td><?=$item->product_ids?></td>
                    <td><?=$item->price?></td>
                    <td><?=$item->name?></td>
                    <td><?=$item->phone?></td>
                    <td><?=$item->email?></td>
                    <td><?=$item->address?></td>
                    <td><?=$item->status?></td>
                    <td><a href="<?=$item->view?>" title="View" aria-label="View" data-pjax="0">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a>
                        <a href="<?=$item->update?>" title="Update" aria-label="Update" data-pjax="0">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="<?=$item->delete?>" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody></table>
    </div>
</div>