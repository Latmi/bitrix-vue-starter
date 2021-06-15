<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
  die();
}

use Bitrix\Iblock\Elements\ElementUsersDataTable;
use Bitrix\Main\Loader;
use Bitrix\Main\UI\Extension;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\Grid\Options as GridOptions;
use Bitrix\Main\UI\PageNavigation;
use Bitrix\Main\Grid\Panel\DefaultValue;
use Bitrix\Main\Grid\Panel\Snippet\Button;
use Bitrix\Main\Grid\Panel\Snippet\Onchange;
use Bitrix\Main\Grid\Panel\Actions;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Highloadblock as HL;

Loader::includeModule('citto.integration');
use Citto\Integration\Docx;

include('evalmath.class.php');


Extension::load('ui.bootstrap4');
Extension::load("ui.buttons.icons");
Extension::load("ui.forms");


/**
 * Класс для работы c KPI
 *
 * Class CittoKPIComponent
 */
class CittoKPIComponent extends CBitrixComponent implements Controllerable
{
  /**
   * Конфигурация аякс запросов
   *
   * @return array
   */
  public function configureActions(): array
  {
    return [
      'test'                => ['prefilters' => []],
    ];
  }


  /**
   * Для работы компонента
   *
   * @return array|mixed
   * @throws Exception Коментарий.
   */
  public function executeComponent()
  {
    global $APPLICATION;
    global $USER;

    $cacheId = implode('|', [
      SITE_ID,
      $APPLICATION->GetCurPage(),
      $USER->GetGroups()
    ]);

    foreach ($this->arParams as $k => $v) {
      if (strncmp('~', $k, 1)) {
        $cacheId .= ',' . $k . '=' . $v;
      }
    }

    $cacheDir = '/' . SITE_ID . $this->GetRelativePath();
    $cache    = Cache::createInstance();

    $templateCachedData = $this->GetTemplateCachedData();

    if ($cache->startDataCache($this->arParams['CACHE_TIME'], $cacheId, $cacheDir)) {
      $this->IncludeComponentTemplate();

      $cache->endDataCache([
        'arResult'           => $this->arResult,
        'templateCachedData' => $templateCachedData,
      ]);
    } else {
      extract($cache->GetVars());
      $this->SetTemplateCachedData($templateCachedData);
    }

    $this->strTemplatePath = $this->__template->GetFolder();

    return $this->arResult;
  }




  public function testAction()
  {

    $arRes = [
      'title' => 'Bitrix',
      'subtitle' => 'Vue',
    ];

    return $arRes;
  }



}
