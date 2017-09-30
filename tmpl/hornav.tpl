<!--<nav>
    <p>Вы здесь:
        <?php $first = true; foreach ($data as $d) { ?>
        <?php if (!$first) { ?> - <?php } ?>
        <?php if ($d->link) { ?><a href="<?=$d->link?>"><?=$d->title?></a><?php } else { ?><?=$d->title?><?php } ?>
        <?php $first = false; } ?>
    </p>
</nav>-->
<div class="bread">
    <div class="bread_pagination">
        <div class="bread_link">
            <?php $first = true; foreach ($data as $d) { ?>
            <?php if (!$first) { ?><?php } ?>
            <?php if ($d->link) { ?><a href="<?=$d->link?>"><?=$d->title?></a><?php } else { ?><span><?=$d->title?></span><?php } ?>
            <?php $first = false; } ?>
        </div>
    </div>
</div>