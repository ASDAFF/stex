<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<form method="GET" action="/catalog/" class="form form-with-select">
    <div class="heading">
        <h3>
            Подбор ковриков
        </h3>
    </div>
    <div class="form-group">
        <select name="filter[make]" id="make">
            <option value="none">
                Марка автомобиля
            </option>
            <?foreach ($arResult['makes'] as $code => $make) : ?>
	            <option value="<?=$code?>" <?if ($code == $_POST['make']) : ?>selected<?endif;?>>
	                <?=$make['name']?>
	            </option>
            <?endforeach?>
        </select>
        
        
    </div>
    <div class="form-group">
        <select name="filter[model]" id="model" <?if (!$arResult['models']) : ?>disabled<?endif;?>>
            <option value="none">
                Модель автомобиля
            </option>
            <?foreach ($arResult['models'] as $code => $model) : ?>
	            <option value="<?=$code?>" <?if ($code == $_POST['model']) : ?>selected<?endif;?>>
	                <?=$model['name']?>
	            </option>
	        <?endforeach?> 
        </select>
    </div>
    <div class="form-group">
        <select name="filter[year]" id="year" <?if (!$arResult['years']) : ?>disabled<?endif;?>>
            <option value="none">
                Год выпуска
            </option>
            <?foreach ($arResult['years'] as $year) : ?>
	            <option value="<?=$year?>">
	                <?=$year?>
	            </option>
	        <?endforeach;?>
        </select>
    </div>
    <div class="btn-wrap">
        <button type="submit" class="btn btn--red">
            <span>
                Подобрать
            </span>
        </button>
    </div>
</form>

<style type="text/css">
    .ajax-shadow {
        opacity: .5;
    }
</style>
