<?php
use yii\captcha\Captcha;
use yii\helpers\Html;
?>

<div class="container1">
    <p>Вы можете задать вопрос нашему психологу.</p>

    <a href="#actionPsych" class="" data-toggle="modal">
        Спросить <i class="fa fa-arrow-circle-right"></i>
    </a>
</div>

<div class="modal fade" id="actionPsych" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                    <?=Html::img('/images/psycholog.jpg',['width'=>'45%']);?>
                    <br>наш психолог постарается ответить на ваши вопросы.</h4>

            </div>
            <div class="modal-body">

<!--                --><?php //$form = \yii\widgets\ActiveForm::begin(['options'=>["class" => "contact-form",'id' => 'callForm']]);?>
<!--                --><?//= $form->field($psych,'name'); ?>
<!--                --><?//= $form->field($psych,'email')->input('email');?>
<!--                --><?//= $form->field($psych,'query')->textarea(['rows'=>5]);?>
<!--                --><?//= $form->field($psych,'publicgroup')->input('text',['value'=>1500,'type'=>'hidden']);?>
<!--                <div class="capcha">-->
<!--                    --><?//=$form->field($psych, 'verifyCode')->widget(Captcha::className(), [
//                        'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14">{input}</div></div>',]);?>
<!--                </div>-->
<!--                --><?//=yii\helpers\Html::submitButton('Отправить', ['class'=> 'add_call'])?>
<!--                --><?php //\yii\widgets\ActiveForm::end() ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>