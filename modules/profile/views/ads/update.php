<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ads */

$this->title = 'редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'личный кабинет', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = ['label' => 'объявления', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'редактирование';
?>
<div class="ads-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
