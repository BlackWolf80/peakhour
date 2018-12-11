<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
//mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Publications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publications-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>


    <?php

    echo $form->field($model, 'spoiler')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

    ?>

    <br /> Класс для вставки больших картинок: <b>public_img_t</b> <br /><br /><br />

    <?php

    echo $form->field($model, 'body')->widget(CKEditor::className(),[

        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

    ?>

    <br /> Класс для вставки больших картинок: <b>public_img_t</b> <br /><br /><br />

    <?php

    echo $form->field($model, 'body2')->widget(CKEditor::className(),[

        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

    ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true,'value'=> 'Alina Pugovkina','disabled'=>'disabled']) ?>


    <?= $form->field($model, 'group')->textInput(['maxlength' => true,'value'=> '1230','disabled'=>'disabled']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
