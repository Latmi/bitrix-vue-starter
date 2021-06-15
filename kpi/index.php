<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная'); ?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
  <div class="kpi">
    <?$APPLICATION->IncludeComponent(
      "citto:kpi",
      "kpi-vue-template",
      Array(),
      false
    );
    ?>
  </div>
<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>