<?php
use yii\helpers\Html;
\app\assets\NormalAsset::register($this);
?>


<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">

                <?php foreach ($publication as $public):?>

                    <!-- .single-blog-post -->
                    <div class="single-blog-post anim-5-all">
                        <!-- .img-holder -->
                        <div class="img-holder">
                            <img src="<?=$public['image'];?>" alt="">
                            <div class="overlay"><a href="/site/public?id=<?=$public['id']?>"><i class="fa fa-link"></i></a></div>
                        </div><!-- /.img-holder -->
                        <!-- .post-meta -->
                        <div class="post-meta">
                            <div class="date-holder">
                                <span>
                                <?php echo date('d', strtotime($public['date']));?>
                                </span>

                                <?php
                                $months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
                                echo $months[date('n', strtotime($public['date']))];
                                ?>

                            </div>
                            <div class="title-holder">
                                <h2 class="title"><?=$public['title'];?></h2>
                                <ul>
                                    <li><a>автор: <?=$public['author'];?> </a></li>
                                    <li><a href="#">Комментариев: 0 </a></li>

                                </ul>
                            </div>
                        </div><!-- /.post-meta -->
                        <!-- .content -->
                        <div class="content">
                            <p><?=$public['spoiler'];?></p>
                            <a href="/site/public?id=<?=$public['id']?>" class="read-more">Читать далее <i class="fa fa-angle-right"></i></a>
                        </div><!-- /.content -->
                    </div>
                <?php endforeach;?>


            </div> <!-- End right-side -->
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>
                <ul class="p0 category_item">
                    <?=\app\components\PublicWidget::widget (['array' => $publication]);?>
                </ul>
                 <!-- End left side -->
        </div> <!-- End row -->
    </div>
</article>

<!-- =============== /blog container ============== -->