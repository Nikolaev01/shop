<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <?php foreach ($items as $item) { ?>
        <li>
            <a <?php if ($item->link == $uri) { ?>class="active"<?php } ?> <?php if ($item->external) { ?>rel="external"<?php } ?> href="<?=$item->link?>"><span><?=$item->title?></span></a>
        </li>
        <?php } ?>
    </ul>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group" id="search">
            <input type="text" placeholder="Что-то ищете?"/>
            <input type="submit" value=""/>
        </div>
    </form>
</div>