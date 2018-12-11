<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\MenuWidget;
use app\components\BannerViewerWidget;

\app\assets\NormalAsset::register($this);
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
<body  class="home">


<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter49097455 = new Ya.Metrika2({
                    id:49097455,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/49097455" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



<?php $this->beginBody() ?>




<!-- =======Header ======= -->
<header>
    <div class="container-fluid top_header">
        <div class="container">
            <p class="float_left">Добро пожаловать на наш портал. </p>
            <div class="float_right">
                <ul class="top_menu">
                    <!--   <li><a href=""><i class="fa fa-facebook"></i></a></li>
                       <li><a href=""><i class="fa fa-twitter"></i></a></li>
                       <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                       <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                       <li>
                           <div  id="search_box">
                               <input id="search" type="text" placeholder="Search here">
                               <button id="button" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                           </div>
                       </li>-->
                    <li>
                        <a href="/profile"><p>Личный кабинет:


                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-user"></span>
                                </button>
                            </p></a>

                    </li>

                    <?php if(!Yii::$app->user->isGuest): ?>
                        <li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>">
                                <p>Выход( <?= Yii::$app->user->identity['name']?>):

                                    <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-share"></span>
                                    </button>
                                </p></a>

                        </li>
                    <?php endif;?>
                </ul>
            </div>
        </div> <!-- end container -->
    </div><!-- end top_header -->
    <div class="bottom_header top-bar-gradient">
        <div class="container clear_fix">
            <div class="float_left logo">
                <a href="/">
                    <img src="/images/logo.png" alt="Час Пик">
                </a>
            </div>
            <div class="float_right address">
                <div class="top-info">
                    <div class="icon-box">
                        <span class=" icon icon-Pointer"></span>
                    </div>
                    <div class="content-box">
                        <p>
                            <?=BannerViewerWidget::widget(['id'=>33,'width'=>200])?>
                        </p>

                    </div>
                </div>
                <div class="top-info">
                    <div class="icon-box">
                        <span class="separator icon icon-Phone2"></span>
                    </div>
                    <div class="content-box">
                        <p>
                            <?=BannerViewerWidget::widget(['id'=>26,'width'=>200])?>
                        </p>
                    </div>
                </div>
                <div class="top-info">
                    <div class="icon-box">
                        <span class="separator icon icon-Timer"></span>
                    </div>
                    <div class="content-box">
                        <p>
                            <?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?>
                        </p>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div> <!-- end bottom_header -->
</header> <!-- end header -->
<!-- ======= /Header ======= -->

<!-- ======= mainmenu-area section ======= -->
<section class="mainmenu-area stricky">
    <div class="container">
        <nav class="clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header clearfix">
                <button type="button" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-th fa-2x"></span>
                </button>
            </div>
            <div class="nav_main_list custom-scroll-bar pull-left" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="hover_slip">
                    <?=MenuWidget::widget ();?>
                </ul>
            </div>
            <div class="find-advisor pull-right">
                <a href="/advertise" class="advisor">Рекламодателям</a>
            </div>
        </nav> <!-- End Nav -->
    </div> <!-- End Container -->
</section>
<!-- ======= /mainmenu-area section ======= -->

<?= Alert::widget() ?>



<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>

                <ul class="p0 category_item">
                    <li><?=Html::a('Личный кабинет',Url::to('/profile'))?></li>
                    <li><?=Html::a('Редактировать профиль',Url::to('/profile/update'))?></li>
                    <li><?=Html::a('Редактировать баннеры ', Url::to('/profile/banner'));?></li>
                    <li><?=Html::a('Редактировать объявления ', Url::to('/profile/ads'));?></li>

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
                <?= Breadcrumbs::widget([
                    'homeLink' => ['label' => '', 'url' => '/'],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <br /><br />
                <?= $content ?>



            </div> <!-- End right-side -->

        </div>
</article>

<!-- =============== /blog container ============== -->






<?=\app\components\ToTopWidget::widget();?>

<!-- ============ free consultation ================ -->

<section class="container-fluid consultation">

</section> <!-- End consultation -->
<!-- ============ /free consultation ================ -->

<!-- ============= Footer ================ -->
<footer>
    <div class="top_footer container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 part1">
                    <a href=""><img src="/images/logo-footer.png" alt="Logo"></a>
                    <p>Если у вас есть вопросы к нам вы можете заполнить
                        <a href="/feedback"><u>форму обратной связи</u></a>
                        или обратиться к нам по адресу:</p>
                    <p>chas-pik023@yandex.ru</p>
                    <p>Мы ответим вам в ближайшее время.</p>
                    <!--
                                        <ul class="p0">
                                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href=""><i class="fa fa-skype"></i></a></li>
                                        </ul>
                    -->
                </div>
                <div class="col-lg-2 col-md-3 col-sm-12 part2">
                    <h5>Сервисы</h5>
                    <ul class="p0">
                        <li><a href="/vacancy"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Вакансии</a></li>
                        <li><a href="/ads"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Объявления</a></li>
                        <li><a href="/advertise"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;Рекламодателям</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 part3">
                    <h5>Контакты</h5>
                    <div class="twitter">
                        <ul class="p0">
                            <li><a>Адрес: г.Краснодар, ул.Российская 315/1</a></li>
                            <li><a>Телефон: +7-928-401-5583</a></li>
                            <li></li>
                        </ul>

                    </div>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-12 part4">
                    <h5>Последние видео</h5>
                    <?=\app\components\VideoFourWidget::widget();?>
                </div>

            </div> <!-- End row -->
        </div>
    </div> <!-- End top_footer -->
    <div class="bottom_footer container-fluid">
        <div class="container">
            <p class="float_left">Copyright &copy; PeakHour 2018. All rights reserved. </p>
            <p class="float_right">Created by: IshutinD</p>
        </div>
    </div> <!-- End bottom_footer -->
</footer>

<?php $this->endBody() ?>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>


</body>
</html>
<?php $this->endPage() ?>
