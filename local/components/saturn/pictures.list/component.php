<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 27.08.2018
 * Time: 21:01
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
$arResult = [
    'PICTURES' => []
];
$res = CIBlockElement::GetList(
    [$arParams['SORT_BY'] => $arParams['SORT_ORDER']],
    [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'ACTIVE' => 'Y'
    ],
    false,
    ['nPageSize' => $arParams['PICTURES_COUNT']],
    ['ID', 'IBLOCK_ID', 'DETAIL_TEXT']
    );

while($ar = $res->Fetch())
{
    $arResult['PICTURES'][] = ['id' => $ar['ID'], 'json' => $ar['DETAIL_TEXT']];
}
$arResult['NAV_STRING'] = $res->GetPageNavStringEx(
    $navComponentObject,
    "Рисунки",
	".default",
    false,
    $this
);

$this->IncludeComponentTemplate();
