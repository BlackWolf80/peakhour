<?php
use app\components\BannerViewerWidget;
use yii\widgets\ActiveForm;
use  yii\helpers\Html;

\app\assets\NormalAsset::register($this);
?>





<div class="col-lg-6 col-md-6 blog_single_post">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?=$form->field($model,'id')->textInput(['value'=>$_GET['id'],'disabled'=>'disabled']);?>
    <?=$form->field($model, 'type')->dropDownList([ '0' => '1 месяц', '1' => '3 месяца']);?>
    <?=Html::submitButton('Породолжить оформление', ['class'=> 'button_e']);?>
    <?php ActiveForm::end();?>

</div>
<div class="col-lg-6 col-md-6 blog_single_post">
    <address>
        <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
        <div class="address_holder float_left">
            Стоимость:<br>
            1 мес. - 150 руб.<br>
            3 мес. - 290 руб.
<br />

        </div>
    </address>
</div>