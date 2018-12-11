<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Publicgroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicgroup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'parent_id')->textInput() ?>-->
    <?= $form->field($model, 'parent_id')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\adm\models\Publicgroup::find()->all(),'id','name')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'status')->textInput() ?>-->
    <?= $form->field($model, 'status')->checkbox([ '0' => 'Не опубликовано', '1' => 'Опубликовано' ]) ?>

    <!--<?= $form->field($model, 'block')->textInput() ?>-->
    <?= $form->field($model, 'block')->checkbox([ '0' => 'Не блокировано', '1' => 'Блокиорвано' ]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
