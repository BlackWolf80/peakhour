<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
<?//=debug($model)?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'username',
//            'password',
//            'auth_key',
            'name',
            'email:email',
            'phone',
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

        ],
    ]) ?>

</div>
