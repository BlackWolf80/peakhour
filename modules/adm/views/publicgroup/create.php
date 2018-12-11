<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\adm\models\Publicgroup */

$this->title = 'Create Publicgroup';
$this->params['breadcrumbs'][] = ['label' => 'Publicgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicgroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
