<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Books */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-view">

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
            'name',
            'file',
            'audio',
            [

                'attribute' => 'img',
                'value' => function($data){
                    return '<img src="'.$data->img.'" width=200 /> <br/ > '.$data->img;
                },
                'format' => 'html',
            ],
            'description:html',
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
        ],
    ]) ?>

</div>
