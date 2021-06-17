<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var CMain $APPLICATION */

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);


Asset::getInstance()->addString('<meta charset="utf-8">');
Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="ie=edge">');


Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/css/normalize.css');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?$APPLICATION->ShowTitle()?></title>
  <?$APPLICATION->ShowHead();?>
  <?$APPLICATION->ShowPanel();?>

</head>

<body>
