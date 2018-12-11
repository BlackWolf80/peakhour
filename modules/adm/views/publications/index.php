<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать публикацию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'date',
//            'spoiler:ntext',
//            'body:ntext',
            'author',
//            'image',
//            'status',
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ?
                        '<span class = "text-danger">Не опубликовано</span>' :
                        '<span class = "text-success">Опубликовано</span>';
                },
                'format'=>'raw',
            ],
            'group',
//            [
//                'attribute' => 'group',
//                'value' => function($data){
//                    $status  = $data->group;
//                    return $status->name;
//                },
//            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
