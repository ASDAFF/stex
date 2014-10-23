<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<nav class="vertical-menu">
    <ul>
        <?foreach ($arResult['items'] as $item) : ?>
            <li><a href="<?=$item['url']?>"><?=$item['name']?></a></li>
        <?endforeach;?>
    </ul>
</nav>