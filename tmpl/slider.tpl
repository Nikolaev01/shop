<div class="container carus">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php foreach ($slide as $item => $value) { ?>
                <?php if($item == 1) { ?>
                    <div class="item active">
                        <a href="<?=$value->link?>"><img src="<?=$value->img?>" alt="<?=$value->title?>"></a>
                    </div>
                <?php } ?>
                <?php if($item !== 1) { ?>
                    <div class="item">
                        <a href="<?=$value->link?>"><img src="<?=$value->img?>" alt="<?=$value->title?>"></a>
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="item">
                <img src="images/slider_img.png" alt="image">
            </div>
            <div class="item">
                <img src="images/slider_img.png" alt="image">
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>