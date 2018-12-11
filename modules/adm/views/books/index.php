<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">
    <p>
        <?= Html::a('Авторы', ['/adm/authors'], ['class' => 'btn btn-primary']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [

                'attribute' => 'name',
                'value' => function($data){

                    return Html::a($data->name,Url::to(['/adm/books/view','id'=>$data->id]));
                },
                'format' => 'html',
            ],

            [

                'attribute' => 'img',
                'value' => function($data){
                    return '<img src="'.$data->img.'" width=70 /> <br/ > '.$data->img;
                },
                'format' => 'html',
            ],
            //'description:ntext',
            'file',
            'audio',
            [
                'attribute' => 'author',
                'value' => function($data){
                    $author  = $data->author0;
                    return $author['name'];
                },
            ],
            [
                'attribute' => 'section',
                'value' => function($data){
                    $author  = $data->section0;
                    return $author['name'];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
