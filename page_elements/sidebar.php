                    
                    <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "left",
                Array(
                    "ROOT_MENU_TYPE" => "left", 
                    "MAX_LEVEL" => "3", 
                    "CHILD_MENU_TYPE" => "", 
                    "USE_EXT" => "Y", 
                    "MENU_CACHE_TYPE" => "A",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => Array()
                )
            );?> 
                    <div class="sidebar__block">
                        <div class="heading">
                            <h3>Продукция компании</h3>
                        </div>
                        <?$APPLICATION->IncludeComponent(
	"tesset:catalog.section.list",
	"",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "9"
	)
);?>
                    </div>
					<div class="sidebar__block">
						<div class="heading">
						<h3>Ролик о продукции</h3>
						</div>
						<div class="sidebar-video">
							<a href="#sidebar-video-popup" class="popup fancybox">
								<img src="/video/video_mini.png">
								<div class="dark"></div>
								<img class="playbtn" src="/img/icons/playbtn.png">
								
							</a>
						</div>
						<div id="sidebar-video-popup" style="display:none">
						<iframe width="560" height="315" src="//www.youtube.com/embed/ckl6Y9B2dlc" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>