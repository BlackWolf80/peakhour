<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Publicgroup */

$this->title = 'Update Publicgroup: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Publicgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publicgroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
