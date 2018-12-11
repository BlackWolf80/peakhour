<?php
\app\assets\NormalAsset::register($this);
use app\components\BannerViewerWidget;
?>

<!-- ================== Faqs ================ -->
<section class="faqs_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 pull-right right_side"> <!-- Right Side -->
                <?=\app\components\PublicViewerWidget::widget(['id'=> 22]);?>
            </div> <!-- End Right Side -->
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side"> <!-- Left Side -->
                <h4></h4>
                <ul class="p0 category_item">
                    <?=\app\components\PublicWidget::widget (['id' => 1300]);?>
                </ul>

                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>220])?></p>
                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>220])?></p><br>
                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>220])?></p>
            </div> <!-- End left side -->
        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
<!-- ================== /Faqs ================ -->