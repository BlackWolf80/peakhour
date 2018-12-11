<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\BannerViewerWidget;
\app\assets\NormalAsset::register($this);
$this->params['breadcrumbs'][] = $this->title;
?>



<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">
                <!-- .single-blog-post -->
                <div class="single-blog-post anim-5-all ptb-13">
                    <!-- .img-holder -->
                    <div class="img-holder">
                        <?=Html::img($public->image);?>
                    </div><!-- /.img-holder -->

                    <!-- .post-meta -->
                    <div class="post-meta">
                        <div class="date-holder">
                                <span>
                                <?php echo date('d', strtotime($public->date));?>
                                </span>

                            <?php
                            $months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
                            echo $months[date('n', strtotime($public->date))];
                            ?>

                        </div>
                    </div><!-- /.post-meta -->
                    <p><a class="fa fa-arrow-circle-left read-more button_e" href="" onclick="javascript:history.back(); return false;"> Назад</a></p>
                    <!-- .content -->
                    <div class="content">

                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p><?=$public->spoiler;?></p>
                                <p><?=$public->body;?></p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p><?=$public->body2;?></p>
                            </div>
                        </div>

                        <?php if($public->body2 != null):?>

                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a  data-toggle="pill" href="#menu1">Страница 1</a></li>
                                <li ><a  data-toggle="pill" href="#menu2">Страница 2</a></li>
                            </ul>
                        <?php endif;?>

                        <p><?=$public->author;?></p>
                    </div><!-- /.content -->
                    <p><a class="fa fa-arrow-circle-left read-more button_e" href="" onclick="javascript:history.back(); return false;"> Назад</a></p>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200,'height'=>70]);?>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200,'height'=>70]);?>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200,'height'=>70]);?>

                </div>
            </div> <!-- End right-side -->
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->

                <h4><?= Html::encode($this->title) ?></h4>
                <ul class="p0 category_item">
                    <?=\app\components\PublicWidget::widget (['id' => $public->group]);?>
                </ul>
                <!-- End left side -->

                <?php foreach ($galery as $image):?>

                    <a href="<?=$image['image']?>" class="flipLightBox">
                        <img class="img-hold" src="<?=$image['image']?>" alt="<?=$image['name']?>" height="500" />
                        <span data-href="06-create-groups-demo.html" data-target="_blank"></span>
                    </a>
                <?php endforeach; ?>


                <br /><br /><br />
                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>200,'height'=>70]);?></p>
                <p><?=BannerViewerWidget::widget(['group'=>0,'width'=>200,'height'=>70]);?></p>
                <?=\app\components\CommentWidget::widget (['array' => $public]);?>
                <br /><br />
            </div> <!-- End left side -->
        </div> <!-- End row -->
    </div>
</article>

<!-- =============== /blog container ============== -->


