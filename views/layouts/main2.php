<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\components\MenuWidget;
use app\components\BannerViewerWidget;

AppAsset::register($this);
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

<?= $content ?>
<?=\app\components\ToTopWidget::widget();?>


<?php $this->endBody() ?>

<script type="text/javascript">
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>


</body>
</html>
<?php $this->endPage() ?>
