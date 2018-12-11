<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = $model->title;
$this->title = 'просмотр';
$this->params['breadcrumbs'][] = ['label' => 'личный кабинет', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = ['label' => 'объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-view">


    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Продлить', Url::to(['/profile/ads/prolong','id'=> $_GET['id']]), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад', ['/profile/banner'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'price',
            'title',
            'body:html',
            'date',
//            'group',
            [
                'attribute' => 'group',
                'value' => function($data){
                    return $data->group0->name;
                },
                'format'=>'raw',
            ],
//            'type',
//            'status',
//            'pay',
//            'premium',
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
            [
                'attribute' => 'status',
                'value' => function($data){
                    return !$data->status ?
                        '<span class = "text-danger">Не опубликовано</span>' :
                        '<span class = "text-success">Опубликовано</span>';
                },
                'format'=>'raw',
            ],
            'organization',
            'contact_name',
            'phone',
            'email:email',
            'address',
//            'video',
//            'user',
        ],
    ]) ?>

</div>
