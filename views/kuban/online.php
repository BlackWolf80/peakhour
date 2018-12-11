<?php
use yii\helpers\Html;
\app\assets\NormalAsset::register($this);
?>

<?php if(isset($_GET['id'])):?>
<?=\app\components\KrdOnlineWidget::widget(['id'=>$_GET['id']])?>
<?php else:?>

<?=\app\components\KrdOnlineWidget::widget(['group'=>1])?>

<?php endif;?>