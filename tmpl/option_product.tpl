    <?php foreach ($item as $one) { ?>
        <div class="coast">
        <div class="coast_span left">
            <span><?=$one['option_name']?>:</span>
        </div>
        <div class="coast_span right">
            <span><?=$one['name']?></span>
        </div>
        <div class="clear"></div>
    </div>
    <?php } ?>