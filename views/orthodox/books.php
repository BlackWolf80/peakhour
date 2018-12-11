<?php
/**
 * Created by PhpStorm.
 * User: danil
 * Date: 14.06.18
 * Time: 20:42
 */
\app\assets\NormalAsset::register($this);
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\BooksWidget;
?>


    <!-- =============== blog container ============== -->
    <article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">

                    <?=BooksWidget::widget(['section'=>200]);?>


                </div> <!-- End right-side -->
                <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                    <h4><?= Html::encode($this->title) ?></h4>
                    <ul class="p0 category_item">

                    </ul>
                    <!-- End left side -->
                    <?=\app\components\RandomSliderWidget::widget(['group'=>2]);?>
                </div> <!-- End row -->
            </div>
    </article>

    <!-- =============== /blog container ============== -->
