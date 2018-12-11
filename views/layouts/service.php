<?php
use yii\helpers\Html;
\app\assets\ServiceAsset::register($this);
use yii\bootstrap\ActiveForm;
use app\models\LoginForm;
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="yandex-verification" content="e4bde6a6a4cb8ae2" />
    <meta name="google-site-verification" content="pocwb49QFOssSmWQSVK2RUZsxVa9StDA9N5f2Xm79y8" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

</head>

<body>
<?php $this->beginBody() ?>
<div id="preloader">
    <div id="status">
        <img src="/images/preloader.gif" height="64" width="64" alt="">
    </div>
</div>

<!-- Intro Section
================================================== -->
<section id="intro">

    <header class="row">

        <div id="logo" >
            <a href="#" >
                <img src="images/logo.png" alt="Zoon">
            </a>
        </div>



    </header> <!-- Header End -->

    <div  id="main" class="row">

        <div class="twelve columns">

            <h1>Сайт закрыт на техническое обслуживание!</h1>

            <p>Приносим извинения за неудобства.</p>



            <br class="container">
                <div class="col-xs-12 col-md-4"></div>
                <div class="col-xs-12 col-md-4">

            <?php if (Yii::$app->user->isGuest) :?>

                    <?php
                    $model = new LoginForm();

                    ?>


                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'action' => '/login',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>


                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

            <?php else:?>

                Извините в текущий момент доступ к сайту разрешен только администратору </br>

                    <?=Html::a('Выход','/logout')?>
            <?php endif;?>


                </div>

            </div>

        </div>

    </div> <!-- main end -->

</section> <!-- end intro section -->




<!-- Java Script
================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/js/service/jquery-1.10.2.min.js"><\/script>')</script>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>