<?php
use yii\helpers\Html;

\app\assets\NormalAsset::register($this);

?>
<?php if(isset($_GET['id'])):?>
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
                <?=\app\components\RandomSliderWidget::widget(['group'=>2]);?>
            </div> <!-- End row -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">

                <?php foreach ($publication as $public):?>

                    <!-- .single-blog-post -->
                    <div class="single-blog-post anim-5-all">
                        <!-- .img-holder -->
                        <div class="img-holder">
                            <img src="<?=$public['image'];?>" alt="">
                            <div class="overlay"><a href="/public?id=<?=$public['id']?>"><i class="fa fa-link"></i></a></div>
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
                            <a href="/public?id=<?=$public['id']?>" class="read-more">Читать далее <i class="fa fa-angle-right"></i></a>
                        </div><!-- /.content -->
                    </div>
                <?php endforeach;?>


            </div> <!-- End right-side -->

        </div>
</article>

<!-- =============== /blog container ============== -->
<?php else:?>
    <!-- =============== blog container ============== -->
    <article class="blog-variation-container blog_four">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 blog_single_post blog_single_post_v4 blog_single_post_v4_v4">
                    <div class="img_holder1 ort">

                        <iframe  src="https://www.youtube.com/embed/logEpxP3ZXI?list=PLMy2Hc3ZKEhpFv0FGWGmb1gyEficuUQg5"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    </div>
                    <h3>ГОСПОДЬ<br>Отец наш Небесный</h3>

                    <p>
                        Как всякий любящий отец, Бог хочет, чтобы Его чада приходили к Нему, общались, разговаривали с Ним.<br />
                        <br />
                        <em>Самое сложное - обратить в православие православных. Православной традиции - это не косынки до бровей и не юбки покроя &laquo;тумба ортодоксия&raquo;, это даже не улыбчиво душевные винипухоподобные батюшки, и не сентиментальный заунывный хнык православных бардов, и что даже &laquo;Блаженны не взявшие Инн&raquo; в нагорной проповеди не упомянуты. Цель данной статьи - рассказать кратко и просто о сущности православного вероучения.</em><br />
                        <br />
                        <em>Вера</em><br />
                        <br />
                        <em><b>&laquo;Блажен, кто верует, тепло ему на свете&raquo;</b> </em>
                    </p>

                    <div>Отче наш, Иже еси на небесех!</div>
                    <div>Да святится имя Твое,</div>
                    <div>да приидет Царствие Твое,</div>
                    <div>да будет воля Твоя,</div>
                    <div>яко на небеси и на земли.</div>
                    <div>Хлеб наш насущный даждь нам днесь;</div>
                    <div>и остави нам долги наша,</div>
                    <div>якоже и мы оставляем должником нашим;</div>
                    <div>и не введи нас во искушение,</div>
                    <div>но избави нас от лукаваго.</div>
                    <div>Ибо Твое есть Царство и сила и слава во веки.</div>
                    <div>Аминь.</div>


                    <?= \app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>5]);?>

                </div>

            </div> <!-- End row -->
        </div> <!-- End container -->
    </article>

    <!-- =============== /blog container ============== -->

<?php endif;?>
