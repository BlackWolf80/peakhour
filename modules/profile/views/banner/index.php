<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Баннеры';
$this->params['breadcrumbs'][] = ['label' => 'личный кабинет', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-index">
<p><?= Html::a('Назад', ['/profile'], ['class' => 'btn btn-danger']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'link',
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
            //'pay',
            [
                'attribute' => 'pay',
                'value' => function($data){
                    return !$data->pay ?
                        '<span class = "text-danger">Не оплачено</span>' :
                        '<span class = "text-success">Оплачено</span>';
                },
                'format'=>'raw',
            ],
            //'group',
            //'email:email',
            //'phone',
            //'contact_name',
            //'organization',
            [
                'attribute' => 'period',
                'value' => function($data){
                    switch ($data->period){
                        case 0:
                            $mess='3 месяца';
                            break;
                        case 1:
                            $mess='6 месяца';
                            break;
                        case 2:
                            $mess='12 месяцев';
                            break;
                        case 3:
                            $mess='безлимит';
                            break;
                    }

                    return $mess;

                },
                'format'=>'raw',
            ],
            //'user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
