<div class="container">
        <div class="row">
            <?php foreach ($category as $item) { ?>
                <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="category">
                    <div class="img_category">
                        <a href="<?=$item->link?>"><img src="<?=$item->img?>" alt="<?=$item->title?>" /></a>
                    </div>
                    <div class="category_link">
                        <a href="<?=$item->link?>"><?=$item->title?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
