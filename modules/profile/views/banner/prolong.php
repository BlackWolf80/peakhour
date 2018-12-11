<?php
use app\components\BannerViewerWidget;
use yii\widgets\ActiveForm;
use  yii\helpers\Html;

\app\assets\NormalAsset::register($this);
?>


<div class="col-lg-6 col-md-6 blog_single_post">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?=$form->field($model,'id')->textInput(['value'=>$_GET['id'],'disabled'=>'disabled']);?>
    <?=$form->field($model, 'period')->dropDownList([ '0' => '3 месяца', '1' => '6 месяцев', '2' => '12 месяцев' ]);?>
    <?=Html::submitButton('Породолжить оформление', ['class'=> 'button_e']);?>
    <?php ActiveForm::end();?>

</div>
<div class="col-lg-6 col-md-6 blog_single_post">
    <address>
        <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
        <div class="address_holder float_left">
            Стоимость:<br>
            3 мес. - 6900 руб.<br>
            6 мес. - 12900 руб.<br>
            12 мес. - 19900 руб.
<br />

        </div>
    </address>
</div>