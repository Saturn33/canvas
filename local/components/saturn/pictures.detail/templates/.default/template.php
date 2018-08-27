<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 27.08.2018
 * Time: 21:59
 */
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss('http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css');
Asset::getInstance()->addJs('http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
Asset::getInstance()->addJs('http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');

Asset::getInstance()->addJs('/local/vendor/signature/jquery.signature.js');
Asset::getInstance()->addCss('/local/vendor/signature/jquery.signature.css');
?>
<div class="signature-wrapper">
    <div id="signature"></div>
</div>
<div class="actions-wrapper">
    <?if (isset($arResult['ERRORS'])):?>
        <?foreach ($arResult['ERRORS'] as $err):?>
            <div class="error"><?=$err?></div>
        <?endforeach;?>
    <?endif;?>

    <input type="button" id="clear" value="Очистить">
    <form name='signature' method="POST" action="">
        <input type="password" name="password" placeholder="<?=$arResult['newPicture'] ? 'Задайте пароль на редактирование' : 'Введите пароль на редактирование'?>">
        <input type="hidden" name="id" value="<?=$arResult['newPicture'] ? 0 : $arResult['PICTURE']['ID']?>">
        <textarea class="hidden" name="json"><?=$arResult['newPicture'] ? '' : $arResult['PICTURE']['JSON']?></textarea>
        <input type="submit" id="save" value="Сохранить">
    </form>

    <div class="listlink">
        <a href="<?=$arParams['SEF_FOLDER']?>">Вернуться к списку</a>
    </div>
</div>

