<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$chunkedResult = array_chunk($arResult['items'], 13);?>
<?foreach ($chunkedResult as $chunk) : ?>
     <ul class="car-list list-unstyled">
          <?foreach ($chunk as $item) : ?>
               <li><a href="/catalog/?filter[make]=<?=$item['code']?>"><?=ucfirst(strtolower($item['name']))?></a></li>
          <?endforeach;?>
     </ul>
<?endforeach;?>     