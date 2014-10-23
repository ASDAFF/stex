<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?$item = $arResult;?>
<div class="bg-image">      
    <div class="cover">
    <h3 class="post-title"><?=$item['name']?>
        <p class="post-excerpt" style="font-size: 19.4285714285714px;color:#fff"><?=$item['date']?></p>                                 
    </h3>
    </div>
</div>


<div class="content">
    <p><?=$item['text']?></p>
</div>

<div class="gallery">
    <?foreach ($item['fancybox'] as $chunk) : ?>
        <div class="row">
            <?foreach ($chunk as $photo) : ?>
                <div class="col-xs-4 item">
                    <a href="<?=$photo['normal']['src']?>" class="popup" data-fancybox-group="gallery"><img src="<?=$photo['thumb']['medium']['src']?>" ></a>
                </div>
            <?endforeach;?>    
        </div>
    <?endforeach;?>    
</div> 

<div class="video-block">   
    <div class="row">
        <div class="col-xs-12">  
            <iframe width="100%" height="450px" src="//www.youtube.com/embed/<?=$item['video']?>" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<div class="content">
    <?=$item['footer']?>

</div>