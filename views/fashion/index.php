<?php
use yii\helpers\Html;
use app\components\BannerViewerWidget;
use app\components\PublicWidget;
\app\assets\NormalAsset::register($this);
?>

<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>
                <ul class="p0 category_item">
                    <?=PublicWidget::widget (['public_group' => $_GET['id']]);?>
                </ul>
                <h5>Публикации:</h5>
                <ul class="p0 category_item">
                    <?=PublicWidget::widget (['array' => $publication]);?>
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

                <?=\app\components\PublicWidget::widget (['arrayPublicList'=>$_GET['id']]);?>


            </div> <!-- End right-side -->

        </div>
</article>

<!-- =============== /blog container ============== -->

