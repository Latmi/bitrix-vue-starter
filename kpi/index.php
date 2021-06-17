<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

  $APPLICATION->IncludeComponent(
    "citto:kpi",
    "kpi-start-template",
    Array(),
    false
  );

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');