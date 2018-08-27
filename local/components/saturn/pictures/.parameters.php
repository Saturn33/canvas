<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule('iblock'))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(Array('-'=>' '));

$arIBlocks=Array();
$db_iblock = CIBlock::GetList(Array('SORT'=>'ASC'), Array('SITE_ID'=>$_REQUEST['site'], 'TYPE' => ($arCurrentValues['IBLOCK_TYPE']!='-'?$arCurrentValues['IBLOCK_TYPE']:'')));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes['ID']] = $arRes['NAME'];

$arComponentParameters = array(
    'GROUPS' => array(
    ),
    'PARAMETERS' => array(
        'PICTURES_COUNT' => array(
            'PARENT' => 'BASE',
            'NAME' => 'Количество рисунков на странице',
            'TYPE' => 'STRING',
            'DEFAULT' => '3',
        ),
        'IBLOCK_TYPE' => Array(
            'PARENT' => 'BASE',
            'NAME' => 'Тип информационного блока (используется только для проверки)',
            'TYPE' => 'LIST',
            'VALUES' => $arTypesEx,
            'DEFAULT' => 'news',
            'REFRESH' => 'Y',
        ),
        'IBLOCK_ID' => Array(
            'PARENT' => 'BASE',
            'NAME' => 'Код информационного блока',
            'TYPE' => 'LIST',
            'VALUES' => $arIBlocks,
            'DEFAULT' => '',
            'ADDITIONAL_VALUES' => 'Y',
            'REFRESH' => 'Y',
        ),
        'CACHE_TIME'  =>  Array('DEFAULT'=>3600),
        "SEF_MODE" => array(
            "pictures" => array(
                "NAME" => 'Список',
                "DEFAULT" => "",
                "VARIABLES" => array()
            ),
            "detail" => array(
                "NAME" => 'Детальная страница',
                "DEFAULT" => "#ELEMENT_ID#",
                "VARIABLES" => array("ELEMENT_ID")
            ),
        ),
    ),
);
?>