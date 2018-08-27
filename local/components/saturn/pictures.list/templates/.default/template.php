<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 27.08.2018
 * Time: 21:32
 */
?>
<?
    use Bitrix\Main\Page\Asset;
    Asset::getInstance()->addCss('http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css');
    Asset::getInstance()->addJs('http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
    Asset::getInstance()->addJs('http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');

    Asset::getInstance()->addJs('/local/vendor/signature/jquery.signature.js');
    Asset::getInstance()->addCss('/local/vendor/signature/jquery.signature.css');
?>
<div class="new-picture">
    <a href="0/">Новый рисунок</a>
</div>
<div class="pictures">
    <?foreach ($arResult['PICTURES'] as $pic):?>
        <a href="<?=$pic['id']?>/">
        <span class="signature-wrapper">

            <span class="signature" data-json='<?=$pic['json']?>'></span>
            <?=$pic['id']?>
        </span>
        </a>
    <?endforeach;?>
</div>
<div class="nav">
<?=$arResult['NAV_STRING'];?>
</div>
