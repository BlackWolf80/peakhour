<?php
\app\assets\NormalAsset::register($this);
use app\components\BannerViewerWidget;
?>
<div class="container">
<?php
echo  BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70]);


if(isset($_GET['message'])&& $_GET['message']==1){ //банер
    echo '<br><h2>Размещение баннера</h2><br>';
    debug($model);
//    $id=$model->id;
//    $routeMessage = 1301;
//    switch ($model->period) {
//        case 0:
//            $summ_ex = '6900';
//            break;
//        case 1:
//            $summ_ex = '12900';
//            break;
//        case 2:
//            $summ_ex = '19900';
//            break;
//    }

}
elseif (isset($_GET['message'])&& $_GET['message']==2) { //объявление
    echo '<br><h2>Размещение объявления</h2><br>';
    $id = $model->id; $premium = 0;
    if($model->premium == 1){$premium=97;}
    $routeMessage = 1302;
    switch ($model->type) {
        case 0:
            $summ_ex = 150 + $premium;
            break;
        case 1:
            $summ_ex = 290 + $premium;
            break;

    }
}
elseif(isset($_GET['message'])&& $_GET['message']==3){ //видеообъявление
    echo '<br><h2>Размещение видеообъявления</h2><br>';
    $id=$model->id;
    $routeMessage = 1303;
    switch ($model->period) {
        case 0:
            $summ_ex = 350;
            break;
        case 1:
            $summ_ex = 900;
            break;
        case 2:
            $summ_ex = 1900;
            break;
    }

}
elseif(isset($_GET['post'])&& $_GET['post']=1){ //видеообъявление
    echo '<br><h2>Размещение вакансии</h2><br>';
    $id=$model->id;
    $summ_ex = 100;
    $routeMessage = 800;
}


//debug($_GET);
// 2.
// Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
// Payment of the set sum with a choice of currency on site ROBOKASSA

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "peakhourru";
//боевой
//$mrh_pass1 = Yii::$app->params['pass1'];
//тестовый
//$mrh_pass1 = Yii::$app->params['pass1_t'];
//$IsTest = 1;

if (Yii::$app->params['testRegim']==0){
    $mrh_pass1 = Yii::$app->params['pass1'];
}
elseif (Yii::$app->params['testRegim']==1){
    $mrh_pass1 = Yii::$app->params['pass1_t'];
    $IsTest = 1;
}

// номер заказа
// number of order
$inv_id = $id;

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
