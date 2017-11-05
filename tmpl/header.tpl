<head>
    <title><?=$title?></title>
    <?php foreach ($meta as $m) {?>
    <meta <?php if ($m->http_equiv) { ?>http-equiv<?php } else { ?>name<?php } ?>="<?=$m->name?>" content="<?=$m->content?>" />
    <?php }?>
    <?php if ($favicon){ ?>
        <link href="<?=$favicon?>" rel="shortcut icon" type="image/x-icon">
    <? } ?>
    <?php foreach ($css as $href) {?>
    <link href="<?=$href?>" rel="stylesheet" type="text/css">
    <?php }?>
    <?php foreach ($js as $src) {?>
    <script src="<?=$src?>"></script>
    <?php }?>
    <?php if ($ie) { ?>
    <!--[if IE]>
    <link href="<?=$ie?>" rel="stylesheet" type="text/css">
    <![endif]-->
    <!--[if IE 10]>
    <link href="<?=$ie?>" rel="stylesheet" type="text/css">
    <![endif]-->
    <?php } ?>
</head>