<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Galery */

$this->title = 'Create Galery';
$this->params['breadcrumbs'][] = ['label' => 'Galeries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
