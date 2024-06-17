<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);

/* 
Если нужно подключить скрипты и стили для конкрентного компонента
$this->addExternalCss("/local/templates/.default/css/swiper.min.css"); */
?>

<section class="vacancy-main">
	<div class="container">
		<div class="row">
			<div class="col-xl-2">
				<div class="section-sub-heading"><? echo ($arResult["NAME"]) ?></div>
			</div>
			<div class="col-xl-10">
				<div class="reasons">
					<div class="reasons-row">
						<div class="reasons-wrap">
                            <?foreach($arResult["PROPERTY_ADD_ADVANT_VALUE"] as $advElem):?> 
							<div class="reasons-item">
								<div class="num"><? echo $advElem["SUB_VALUES"]["ADD_CHISLO"]["VALUE"];?></div>
								<div class="reasons-item-content">
                                    <p class="title"><? echo htmlspecialcharsBack($advElem["SUB_VALUES"]["ADD_ZAG"]["VALUE"]);?></p>
                                    <p class="text"><? echo $advElem["SUB_VALUES"]["ADD_DESCRIPT"]["VALUE"];?></p>
							    </div>
							</div>
							<?endforeach;?>
						</div>
						<div class="reasons-img">
							<img src="<? echo $arResult["PREVIEW_PICTURE"]["SRC"] ?>" alt="<? echo $arResult["NAME"] ?>" />
						</div>
					</div>
                    <?if($arResult["PROPERTY_CITATA_VALUE"]):?>
					<div class="reasons-quote">
                        <? echo $arResult["PROPERTY_CITATA_VALUE"]; ?>
					</div>
                    <?endif;?>
				</div>
			</div>
		</div>
	</div>
</section>

<?// echo "<pre>"; print_r($arResult); echo "</pre>"; ?>