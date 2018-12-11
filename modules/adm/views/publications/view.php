<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Publications */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publications-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать публикацию', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Менеджер картинок', ['/elfinder/manager'], ['class' => 'btn btn-primary','target'=>'_blank']) ?>



        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'date',
            'spoiler:html',
            'body:html',
            'body2:html',
            'author',
//            'image',
            [

                'attribute' => 'image',
                'value' => function($data){
                    return '<img src="'.$data->image.'" width=200 /> <br/ > '.$data->image;
                },
                'format' => 'html',
            ],
            'status',
            'group',
            'keywords',
            'description',
        ],
    ]) ?>

    <br/>Комментарии:<br/><br/>
    <?= GridView::widget([
        'dataProvider' => $dataProviderComments,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'author',
            'text:html',
//            'publication',
            [
                'attribute' => 'publication',
                'value' => function($data){
                    $publication  = $data->publications;
                    return $publication->title;
                },
            ],
            'date',

            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ?
                        '<span class = "text-danger">Не опубликовано</span>' :
                        '<span class = "text-success">Опубликовано</span>';
                },
                'format'=>'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
