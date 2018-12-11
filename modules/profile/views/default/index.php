<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\components\BannerViewerWidget;
\app\assets\NormalAsset::register($this);
?>

<div class="profile-default-index">
    <br /><br />
    <!-- class="timer" data-from="1" data-to="12" data-speed="5000" data-refresh-interval="50"-->
    Баннеры: <?=Html::a('Баннеры: '.count($banners), ['/profile/banner'],
        [
                'class' => 'btn btn-primary timer',
                'data-from' => '0',
                'data-to' => count($banners),
                'data-speed' => '500',
                'data-refresh-interval' => '50'
        ]);?>
    Объявления: <?=Html::a('Объявления: '.count($ads), ['/profile/ads'], [
        'class' => 'btn btn-primary timer',
        'data-from' => '0',
        'data-to' => count($ads),
        'data-speed' => '500',
        'data-refresh-interval' => '50'
    ]);?>

    Вакансии: <?=Html::a('Вакансии: '.count($vacantions), ['/profile/ads'], [
        'class' => 'btn btn-primary timer',
        'data-from' => '0',
        'data-to' => count($vacantions),
        'data-speed' => '500',
        'data-refresh-interval' => '50'
    ]);?>
    <br /><br />
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
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
    <?php
    if($model->role == 'root'){
        echo Html::a('Администрирование', ['/adm'], ['class' => 'btn btn-success','target'=>'_blank']);
        echo '  '.Html::a('GII', ['/gii'], ['class' => 'btn btn-primary','target'=>'_blank']);
        echo ' <a class="btn btn-primary" href="http://localhost/phpmyadmin" target="_blank">PHP Myadmin (local)</a>
                    <a class="btn btn-primary" href="https://vh118.timeweb.ru/pma/import.php" target="_blank">PHP Myadmin (site)</a>';
    }
    elseif ($model->role == 'corr'){
        echo Html::a('Редактировать статьи', ['/adm/corr'], ['class' => 'btn btn-primary','target'=>'_blank']);
    }
    ?>

</div>
