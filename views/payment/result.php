﻿<?php
\app\assets\NormalAsset::register($this);


// регистрационная информация (пароль #2)
// registration info (password #2)
//боевой
//$mrh_pass2 = Yii::$app->params['pass2'];
//тестовый
//$mrh_pass2 = Yii::$app->params['pass2_t'];

if (Yii::$app->params['testRegim']==0){
    $mrh_pass2 = Yii::$app->params['pass2'];
}
elseif (Yii::$app->params['testRegim']==1){
    $mrh_pass2 = Yii::$app->params['pass2_t'];
    $IsTest = 1;
}
//установка текущего времени
//current date
$tm=getdate(time()+9*3600);
$date="$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$shp_item = $_REQUEST["Shp_item"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

// проверка корректности подписи
// check signature
if ($my_crc !=$crc)
{
  echo "bad sign\n";
  exit();
}

// признак успешно проведенной операции
// success
echo "OK$inv_id\n";

// запись в файл информации о проведенной операции
// save order info to file
$f=@fopen("order.txt","a+") or
          die("error");
fputs($f,"order_num :$inv_id;Summ :$out_summ;Date :$date\n");
fclose($f);

?>


