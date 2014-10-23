<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="nav navbar-nav">
   <!--  <li class="dropdown<? echo $active[1]; ?>"><a href="/">Главная</a></li>

    <li class="dropdown<? echo $active[2]; ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">О компании</a>
        <ul class="dropdown-menu">
            <li><a href="/about">О компании</a></li>
            <li><a href="/about/sertificates">Наши достижения</a></li>
            <li><a href="/about/managers">Ваши менеджеры</a></li>
            <li><a href="/about/partners">Партнеры</a></li>
            <li><a href="/about/vacations">Вакансии</a></li>

        </ul>
    </li> -->

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="dropdown <?if ($arItem["SELECTED"]):?>active<?endif;?>">
        		<a href="<?=$arItem["LINK"]?>" class="dropdown-toggle" data-toggle="dropdown"><?=$arItem["TEXT"]?></a>
				<ul class="dropdown-menu">
			<!-- <li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul> -->
		<?else:?>
			<li class="dropdown <?if ($arItem["SELECTED"]):?>active<?endif;?>">
        		<a href="<?=$arItem["LINK"]?>" class="dropdown-toggle" data-toggle="dropdown"><?=$arItem["TEXT"]?></a>
        		<ul class="dropdown-menu">
			<!-- <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
				<ul> -->
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?endif;?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<!-- <li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li> -->
			<?else:?>
				<li class="<?if ($arItem["SELECTED"]):?>active<?endif;?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
				<!-- <li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li> -->
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="" class="<?if ($arItem["SELECTED"]):?>active<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>
</ul>
<?endif?>