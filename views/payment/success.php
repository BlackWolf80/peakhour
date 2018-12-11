<div class="container">
<?php

\app\assets\NormalAsset::register($this);
use app\components\BannerViewerWidget;


// регистрационная информация (пароль #1)
// registration info (password #1)
//$mrh_pass1 = "NfwwR3fv1EA9rwjE7Lh1";
//$mrh_pass1 = Yii::$app->params['pass1'];
//тестовый
//$mrh_pass1 = Yii::$app->params['pass1_t'];

if (Yii::$app->params['testRegim']==0){
    $mrh_pass1 = Yii::$app->params['pass1'];
}
elseif (Yii::$app->params['testRegim']==1){
    $mrh_pass1 = Yii::$app->params['pass1_t'];
    $IsTest = 1;
}

// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$shp_item = $_REQUEST["Shp_item"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

// проверка корректности подписи
// check signature
if ($my_crc != $crc)
{
  echo "bad sign\n";
  exit();
}

// проверка наличия номера счета в истории операций
// check of number of the order info in history of operations
$f=@fopen("order.txt","r+") or die("error");

while(!feof($f))
{
  $str=fgets($f);

  $str_exp = explode(";", $str);
  if ($str_exp[0]=="order_num :$inv_id")
  {
//      echo  BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70]);
        echo '<br /><br /><br />';

      switch ($shp_item) {
          case 800: //вакансия
              \app\components\MailVacantionWidget::widget(['id'=>$inv_id]);
              echo "<div class='container'>Операция прошла успешно.<br>Ваша заявка отправлена на модерацию и будет опубликована в течении 24 часов.</div>";
              Yii::$app->db->createCommand("UPDATE vacantion SET premium = 2  WHERE id= $inv_id")->execute();
              echo '<meta http-equiv="refresh" content="0;URL=/vacancy">';
//              Yii::$app->db->createCommand("UPDATE vacantion SET status = 1   WHERE id= $inv_id")->execute();
              break;
          case 1301://банер
              echo "<div class='container'>Операция прошла успешно.<br>Ваш банер опубликован и будет демонстрироваться в течении оплаченого времени.</div>";
              Yii::$app->db->createCommand("UPDATE banners SET pay = 1  WHERE id= $inv_id")->execute();
              Yii::$app->db->createCommand("UPDATE banners SET status = 1  WHERE id= $inv_id")->execute();
              echo '<meta http-equiv="refresh" content="0;URL=/ads">';
              break;
          case 13011:
              echo "<div class='container'>Операция прошла успешно.<br>Ваш банер опубликован и будет демонстрироваться в течении оплаченого времени.</div>";
              if($out_summ==6900){$period = 0;}
              elseif ($out_summ==12900){$period = 1;}
              elseif ($out_summ==19900){$period = 2;}
              $date = date('Y-m-d H:i:s');
              Yii::$app->db->createCommand("UPDATE banners SET period = '$period', date = '$date'  WHERE id = '$inv_id'")->execute();
              echo '<meta http-equiv="refresh" content="0;URL=/ads">';
              break;
          case 1302://объявление
              echo "<div class='container'>Операция прошла успешно.<br>Ваша заявка отправлена на модерацию и будет опубликована в течении 24 часов.</div>";
              Yii::$app->db->createCommand("UPDATE ads SET pay = 1  WHERE id= $inv_id")->execute();
              break;
          case 13021:
              echo "<div class='container'>Операция прошла успешно.<br>Ваша заявка отправлена на модерацию и будет опубликована в течении 24 часов.</div>";
              Yii::$app->db->createCommand("UPDATE ads SET  date = date('Y-m-d H:i:s')  WHERE id= $inv_id")->execute();
              Yii::$app->db->createCommand("UPDATE ads SET status = 0  WHERE id= $inv_id")->execute();
              echo '<meta http-equiv="refresh" content="0;URL=/ads">';
              break;
          case 1303://видеообъявление

              break;
      }

  }
}
fclose($f);
?>


</div><br /><br /><br />