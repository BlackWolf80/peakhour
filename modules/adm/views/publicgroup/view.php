<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Publicgroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publicgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicgroup-view">

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
            'parent_id',
            'name',
            'title',
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
//            'block',
            [
                'attribute' => 'block',
                'value' => function($data){
                    return !$data->block ?
                        '<span class = "text-danger">Не блокировано</span>' :
                        '<span class = "text-success">Блокировано</span>';
                },
                'format'=>'raw',
            ],
            'address',
            'description',
            'keywords',
        ],
    ]) ?>

</div>
