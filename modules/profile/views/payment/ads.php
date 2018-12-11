<?php
\app\assets\NormalAsset::register($this);
use app\components\BannerViewerWidget;
?>
<div class="container">
<?php
echo  BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70]);



    echo '<br><h2>Продление баннера</h2><br>';

    $routeMessage = 13021;
    switch ($model->type) {
        case 0:
            $summ_ex = Yii::$app->params['priceAds1Month'];
            break;
        case 1:
            $summ_ex = Yii::$app->params['priceAds3Month'];
            break;
    }



//debug($_GET);
// 2.
// Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
// Payment of the set sum with a choice of currency on site ROBOKASSA

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "peakhourru";
if (Yii::$app->params['testRegim']==0){
    $mrh_pass1 = Yii::$app->params['pass1'];
}
elseif (Yii::$app->params['testRegim']==1){
    $mrh_pass1 = Yii::$app->params['pass1_t'];
    $IsTest = 1;
}

// номер заказа
// number of order
$inv_id = $model->id;

// описание заказа
// order description
$inv_desc = "ROBOKASSA Advanced User Guide";

// сумма заказа
// sum of order
$out_summ = $summ_ex;

// тип товара
// code of goods
$shp_item = $routeMessage;

// предлагаемая валюта платежа
// default payment e-currency
$in_curr = "";

// язык
// language
$culture = "ru";


// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
$encoding = "utf-8";

if (Yii::$app->params['testRegim']==1) {
    $testInput = '<input type=hidden name=IsTest value='.$IsTest.'>';
}
else{$testInput = '';}
echo '<br>Заказ №'. $inv_id ;
echo '<p> Сумма к оплате: '.$summ_ex.'</p>';
// форма оплаты товара
// payment form
print "<html>".
    "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
    "<input type=hidden name=MrchLogin value=$mrh_login>".
    "<input type=hidden name=OutSum value=$out_summ>".
    "<input type=hidden name=InvId value=$inv_id>".
    "<input type=hidden name=Desc value='$inv_desc'>".
    "<input type=hidden name=SignatureValue value=$crc>".
    "<input type=hidden name=Shp_item value='$shp_item'>".
    "$testInput".
    "<input type=hidden name=IncCurrLabel value=$in_curr>".
    "<input type=hidden name=Culture value=$culture>".
    "<input type=submit value='Перейти к оплате'>".
    "</form></html>";
?>
</div><br /><br /><br />
