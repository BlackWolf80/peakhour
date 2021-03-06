<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galeries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Galery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'image',
            [
                'attribute' => 'image',
                'value' =>function($data){
                    return '<img src="'.$data->image.'" width="90">';
                },
                'format' => 'html',
            ],

            'publication',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
