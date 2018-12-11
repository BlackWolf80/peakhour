<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['enabled'=>'flase']) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?php

    echo $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);

    ?>

    <?= $form->field($model, 'publication')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\adm\models\Publications::find()->all(),'id','title')) ?>

    <?= $form->field($model, 'status')->checkbox([ '0' => 'Нет', '1' => 'Да',]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
