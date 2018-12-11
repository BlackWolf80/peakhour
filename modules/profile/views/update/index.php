<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
?>

<div class="users-form">

    <br /><br />
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>$modelIns->password]) ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true,'value'=>$modelIns->name]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'value'=>$modelIns->email]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'value'=>$modelIns->phone]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?=Html::a('Отмена','/profile',['class'=>'btn btn-danger'])?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
