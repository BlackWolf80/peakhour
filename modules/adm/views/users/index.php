<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\adm\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
//            'password',
//            'auth_key',
            'name',
            'email:email',
            'phone',
//            'role',
            [
                'attribute' => 'role',
                'value' => function($data){
                    $mess='';
                    switch ($data->role){
                        case 'users':
                            $mess='<span class = "text-success">Пользователь</span>';
                            break;
                        case 'root':
                            $mess='<span class = "text-danger">Администратор</span>';
                            break;
                        case 'corr':
                            $mess='<span class = "text-success">Корреспондент</span>';
                            break;
                    }

                    return $mess;
                },
                'format'=>'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
