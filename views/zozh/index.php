<?php
use yii\helpers\Html;
use app\components\BannerViewerWidget;
\app\assets\NormalAsset::register($this);
?>

<?=\app\components\PublicViewerWidget::widget()?>
<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">

                <?php if($_GET['id']==1801):?>
                    <?=\app\components\PublicViewerWidget::widget(['id'=>85,'fl'=>1])?><br />
                <?php elseif ($_GET['id']==1802):?>
                    <?=\app\components\PublicViewerWidget::widget(['id'=>94,'fl'=>1])?><br />
                <?php endif;?>

                <?=\app\components\PublicWidget::widget (['arrayPublicList'=>$_GET['id']]);?>


            </div> <!-- End right-side -->
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side  ptb-13"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>
                <ul class="p0 category_item">
                    <?php
                    if($publication !=null){
                        echo \app\components\PublicWidget::widget (['array' => $publication]);
                    }

                    ?>
                </ul>
                <!-- End left side -->
                <?php
                if(isset($videoGroup)){
                    echo ' <br /><h4>Видео.</h4> <br /><div class="viddeo">';
                    echo \app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>$videoGroup]);
                    echo '<br /></div>';
                }
                ?>
                <br /><br /><br />
                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>290,'height'=>90]);?></p>
                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>290,'height'=>90]);?></p>
                <br />

                <?php if($_GET['id']==1801):?>
                    <?=\app\components\GalleryViewerWidget::widget(['public'=>85])?><br />
                    <?=\app\components\CommentWidget::widget (['public' => 85]);?><br />
                <?php elseif ($_GET['id']==1802):?>
                    <?=\app\components\GalleryViewerWidget::widget(['public'=>94])?><br />
                    <?=\app\components\CommentWidget::widget (['public' => 94]);?><br />
                <?php endif;?>

            </div> <!-- End row -->
        </div>
</article>

<!-- =============== /blog container ============== -->

