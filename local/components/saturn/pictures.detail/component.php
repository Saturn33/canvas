<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 27.08.2018
 * Time: 20:59
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
$elID = intval($arParams['ELEMENT_ID']);
/*Обработка сохранения*/
if (isset($_POST['id'], $_POST['json'], $_POST['password']))
{
    $id = intval($_POST['id']);
    $password = sha1($_POST['password']);
    $json = $_POST['json'];
    $el = new CIBlockElement;
    if ($id == 0)//новый рисунок
    {
        $ob = $el->Add([
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'NAME' => 'Рисунок',
            'DETAIL_TEXT' => $json,
            'PROPERTY_VALUES' => ['PASSWORD' => $password]
        ]);
        if ($ob) {
            $elID = $ob;
            LocalRedirect($arParams['SEF_FOLDER'].$elID.'/');
        }
        else
            $arResult['ERRORS'] = $el->LAST_ERROR;
    }
    else//обновление старого рисунка
    {
        $res = CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y',
                'ID' => $id,
                'PROPERTY_PASSWORD' => $password
            ],
            false,
            false,
            ['ID']
        );
        if ($ar = $res->Fetch()) {//если нашли элемент с таким id и паролем
            if ($el->Update($id, ['DETAIL_TEXT' => $json]))
                $elID = $id;
            else
                $arResult['ERRORS'][] = $el->LAST_ERROR;
        }
        else
        {//если такого элемента нет или пароль не совпадает
            $arResult['ERRORS'][] = 'Ошибка сохранения';
        }

    }
}

/*Обработка отображения*/
$arResult['newPicture'] = $elID == 0;
if (!$arResult['newPicture']) {
    $res = CIBlockElement::GetList(
        ['SORT' => 'ASC'],
        [
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'ACTIVE' => 'Y',
            'ID' => $elID
        ],
        false,
        false,
        ['ID', 'IBLOCK_ID', 'DETAIL_TEXT']
    );

    if ($ar = $res->Fetch())
        $arResult['PICTURE'] = ['ID' => $ar['ID'], 'JSON' => $ar['DETAIL_TEXT']];
    else
        $arResult['newPicture'] = true;
}

$title = $arResult['newPicture'] ? 'Новый рисунок' : 'Рисунок №'.$elID;
$APPLICATION->AddChainItem($title);
$APPLICATION->setTitle($title);
$this->IncludeComponentTemplate();
