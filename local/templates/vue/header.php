<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var CMain $APPLICATION */

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);






Asset::getInstance()->addString('<meta name="viewport" content="width=device-width,initial-scale=1">');
?><!doctype html>
<html lang="<?=LANGUAGE_ID?>">
<head>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead();?>
<?$APPLICATION->ShowPanel(); ?>
</head>
<body>
