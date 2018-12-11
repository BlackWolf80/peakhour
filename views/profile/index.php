<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\components\BannerViewerWidget;
\app\assets\NormalAsset::register($this);
?>


<!--<div class="usr-default-index container">-->
<!--    <h1>Личный кабинет находится в разрабоке</h1>-->
<!--    <p>-->
<!--        Приносим извинения за неудобства.-->
<!--    </p>-->
<!---->
<!--</div>-->


<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>

                <ul class="p0 category_item">
                    <li><?=Html::a('Редактировать профиль',Url::to('/profile/update'))?></li>

                </ul>


                <!-- End left side -->
                <p>
                <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                <div class="address_holder float_left"><?=BannerViewerWidget::widget(['group'=>0,'width'=>220])?></div>
                </p>
                <p class="clear_fix">
                <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                <div class="address_holder float_left"><?=BannerViewerWidget::widget(['group'=>0,'width'=>220])?></div>
                </p>
                <p class="clear_fix">
                <div class="icon_holder float_left"><span class="icon icon-Phone2"></span></div>
                <div class="address_holder float_left"><?=BannerViewerWidget::widget(['group'=>0,'width'=>220])?></div>
                </p>

            </div> <!-- End row -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">
                    <br /><br />
                 <?=Html::a('Баннеры: '.count($banners), ['/profile/banners'], ['class' => 'btn btn-primary']);?>
                <?=Html::a('Объявления: '.count($ads), ['/profile/ads'], ['class' => 'btn btn-primary']);?>
                <br /><br />
                <?php if($modeFlag==0):?>
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
                        echo Html::a('Редактировать статьи', ['/adm/alina'], ['class' => 'btn btn-primary','target'=>'_blank']);
                    }
                    ?>

                    <p>  </p>
                <?php elseif ($modeFlag==1):?>
                    <div class="users-form">

                        <br /><br />
                        <?php $form = ActiveForm::begin(); ?>


                        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>$modelIns->password]) ?>


                        <?= $form->field($model, 'name')->textInput(['maxlength' => true,'value'=>$modelIns->name]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => true,'value'=>$modelIns->email]) ?>

                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'value'=>$modelIns->phone]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                            <?=Html::a('Отмена','/profile',['class'=>'btn btn-danger'])?>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                <?php endif;?>

            </div> <!-- End right-side -->

        </div>
</article>

<!-- =============== /blog container ============== -->




