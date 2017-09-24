<div class="block__categories centrum">

    <?php foreach ($category as $item) { ?>
    <div class="category">
        <div class="img_category">
            <a href="<?=$item->link?>"><img src="<?=$item->img?>" alt="<?=$item->title?>"></a>
        </div>
        <div class="category_link">
            <a href="<?=$item->link?>"><?=$item->title?></a>
        </div>
    </div>
    <?php } ?>
</div>