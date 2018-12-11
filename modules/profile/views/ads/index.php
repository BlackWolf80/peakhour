<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'объявления';
$this->params['breadcrumbs'][] = ['label' => 'личный кабинет', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-index">
    <p><?= Html::a('Назад', ['/profile'], ['class' => 'btn btn-danger']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'price',
            'title',
//            'body:ntext',
            'date',
            //'group',
            [
                'attribute' => 'group',
                'value' => function($data){
                    return $data->group0->name;
                },
                'format'=>'raw',
            ],
//            'type',
            [
                'attribute' => 'type',
                'value' => function($data){
                    switch ($data->type){
                        case 0:
                            $mess='1 месяц';
                            break;
                        case 1:
                            $mess='3 месяца';
                            break;
                        case 2:
                            $mess='безлимит';
                            break;
                    }

                    return $mess;

                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'premium',
                'value' => function($data){
                    return !$data->premium ?
                        '<span class = "text-success"> Нет</span>' :
                        '<span class = "text-danger">Да</span>';
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'pay',
                'value' => function($data){
                    return !$data->pay ?
                        '<span class = "text-danger">Нет</span>' :
                        '<span class = "text-success">Да</span>';
                },
                'format'=>'raw',
            ],
//            [
//                'attribute' => 'status',
//                'value' => function($data){
//                    return !$data->status ?
//                        '<span class = "text-danger">Не опубликовано</span>' :
//                        '<span class = "text-success">Опубликовано</span>';
//                },
//                'format'=>'raw',
//            ],
            //'status',
            //'pay',

            //'premium',

            //'organization',
            //'contact_name',
            //'phone',
            //'email:email',
            //'address',
            //'video',
            //'user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
