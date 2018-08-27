<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 27.08.2018
 * Time: 20:55
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->IncludeComponent("saturn:pictures.detail", ".default", Array(
	"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
	"IBLOCK_ID" => $arParams['IBLOCK_ID'],
    "ELEMENT_ID" => $arResult['VARIABLES']['ELEMENT_ID'],
    "SEF_FOLDER" => $arParams['SEF_FOLDER']
	),
	false
);?>