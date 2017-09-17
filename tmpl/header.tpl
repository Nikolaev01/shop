<head>
    <title><?=$title?></title>
    <?php foreach ($meta as $m) {?>
        <meta <?php if ($m->http_equiv) {?> http-equiv<? } else {?> name <? }?>="<?=$m->name?>" content="<?=$m->content?>">
    <?php }?>
    <?php if ($favicon){?>
    <link href="<?=favicon?>" rel="shortcut icon" type="image/x-icon">
    <? }?>
    <?php foreach ($css as $href) {?>
    <link href="<?=href?>" rel="stylesheet" type="text/css">
    <?php }?>
    <?php foreach ($js as $src) {?>
    <script src="<?=src?>"></script>
    <?php }?>
</head>