<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
\app\assets\NormalAsset::register($this);

?>

<div class="site-login container">
<!--    <h3>--><?//= Html::encode($this->title) ?><!--</h3>-->

    <p>Пожалуйста заполните все поля формы:</p>

    <!--<?//=$hash = Yii::$app->getSecurity()->generatePasswordHash('123');?>-->

    <?php $form = ActiveForm::begin(['options'=>["class" => "contact-form",'id' => 'callForm']]) ?>

    <table>
            <td>
                <?= $form->field($model, 'name') ?>
            </td>
            <td>
                <?= $form->field($model, 'email')->textInput('email') ?>
            </td>
            <td>
                <?= $form->field($model, 'text') ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-2">{image}</div><div class="col-lg-14  capcha">{input}</div></div>',]) ?>
            </td>
            <td>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </td>
        </tr>
    </table>


    <?php ActiveForm::end(); ?>
    <br /><br /><br />
</div>