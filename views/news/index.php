<?php
use yii\helpers\Html;
\app\assets\NormalAsset::register($this);
?>

<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>
                <ul class="p0 category_item">
                    <?=\app\components\PublicWidget::widget (['array' => $publication]);?>
                </ul>
                <!-- End left side -->
                <?php
                if(isset($videoGroup)){
                    echo ' <br /><h4>Видео.</h4> <br /><div class="viddeo">';
                    echo \app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>$videoGroup]);
                    echo '<br /></div>';
                }

                ?>
            </div> <!-- End row -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">
                <?=\app\components\PublicWidget::widget (['arrayPublicList'=>$_GET['id']]);?>
            </div> <!-- End right-side -->
        </div>
</article>
<!-- =============== /blog container ============== -->

