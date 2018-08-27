<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рисунки на канвасе");
?><?$APPLICATION->IncludeComponent(
	"saturn:pictures",
	".default",
	array(
		"IBLOCK_TYPE" => "pictures",
		"IBLOCK_ID" => "3",
		"PICTURES_COUNT" => "4",
		"SORT_BY" => "ACTIVE_FROM",
		"SORT_ORDER" => "DESC",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"DISPLAY_PANEL" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"SEF_FOLDER" => "/pictures/",
		"SEF_MODE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"SEF_URL_TEMPLATES" => array(
			"pictures" => "",
			"detail" => "#ELEMENT_ID#/",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>