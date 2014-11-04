                <?if (strpos($APPLICATION->GetCurDir(), 'catalog') === false) : ?>                    
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
                <?endif;?>
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
						<?$APPLICATION->IncludeFile('/include/sidebar.block.php');?>
					</div>