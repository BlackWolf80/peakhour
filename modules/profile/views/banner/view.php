<?php

use yii\helpers\Html;
use \yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Banners */

$this->title = 'просмотр';
$this->params['breadcrumbs'][] = ['label' => 'личный кабинет', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = ['label' => 'баннеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banners-view">


    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Продлить', Url::to(['/profile/banner/prolong','id'=> $_GET['id']]), ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назад', ['/profile/banner'], ['class' => 'btn btn-danger']) ?>

    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'image',
                'value' =>function($data){
                    return '<img src="/images/upload/store/'.$data->image.'" width="140">';
                },
                'format' => 'html',
            ],
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
//            'pay',
            [
                'attribute' => 'pay',
                'value' => function($data){
                    return !$data->pay ?
                        '<span class = "text-danger">Не оплачено</span>' :
                        '<span class = "text-success">Оплачено</span>';
                },
                'format'=>'raw',
            ],
//            'group',
            'email:email',
            'phone',
            'contact_name',
            'organization',

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



//            'user',
        ],
    ]) ?>

</div>
