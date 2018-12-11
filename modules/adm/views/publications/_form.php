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
    <div class="form-group">
        <?= Html::a('Менеджер картинок', ['/elfinder/manager'], ['class' => 'btn btn-primary','target'=>'_blank']) ?>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

   <!-- <?= $form->field($model, 'spoiler')->textarea(['rows' => 6]) ?>-->

    <br />public_img_t
    <!--<?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>-->

    <?php

    echo $form->field($model, 'spoiler')->widget(CKEditor::className(),[
//        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

    ?>

    <?php

    echo $form->field($model, 'body')->widget(CKEditor::className(),[
//        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

    ?>

    <?php

    echo $form->field($model, 'body2')->widget(CKEditor::className(),[
        //        'editorOptions' => [
//            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//            'inline' => false, //по умолчанию false
//        ],
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some CKEditor Options */]),
    ]);

    ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'news')->checkbox([ '0' => 'Не опубликовано', '1' => 'Опубликовано' ]) ?>


   <!-- <?= $form->field($model, 'status')->textInput() ?>-->
    <?= $form->field($model, 'status')->checkbox([ '0' => 'Не опубликовано', '1' => 'Опубликовано' ]) ?>



   <!-- <?= $form->field($model, 'group')->textInput() ?>-->

    <?= $form->field($model, 'group')
        ->dropDownList(\yii\helpers\ArrayHelper::map(\app\modules\adm\models\Publicgroup::find()->all(),'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
