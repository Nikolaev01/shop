<div id="slider-wrap">
    <div id="slider">
        <?php foreach ($slide as $item) { ?>
        <div class="slide"><a href="<?=$item->link?>"> <img src="<?=$item->img?>" alt="<?=$item->title?>"></a></div>
        <?php } ?>
    </div>
</div>