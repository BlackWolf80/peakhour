<?php
\app\assets\NormalAsset::register($this);
use yii\helpers\Html;
use app\components\BannerViewerWidget;
?>
<?php if(isset($_GET['id'])):?>

    <!-- ================== public ========== -->
    <section class="blog-container two-side-background single-blog-page faqs_sec"> <!-- faqs_sec use for style right side content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 white-left left-content ptb-80">
                    <!-- .single-blog-post -->
                    <?=\app\components\PublicWidget::widget (['arrayPublicList'=>$_GET['id']]);?>

                </div>


                <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pdr5"> <!--for this page-(Right Side) -->

                     <h4>Эвридика Александровна Еремина.</h4>
                    <?=Html::img('/images/psycholog.jpg',['width'=>'45%']);?>
                    <br>


                        <ul class="p0 category_item">

                            <?php
                            if($publication != null) {

                            echo '<h4>'.Html::encode($this->title).' - cтатьи</h4>'.\app\components\PublicWidget::widget (['array' => $publication]);
                            }
                            ;?>
                        </ul>
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

                </div> <!-- End left side -->
            </div>
        </div>
    </section>
    <!-- ================== /public ========== -->


<?php else:?>

    <!-- ================== start ========== -->
    <section class="blog-container two-side-background single-blog-page faqs_sec"> <!-- faqs_sec use for style right side content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 white-left left-content ptb-80">
                    <!-- .single-blog-post -->
                    <p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; В современном мире сложно представить себе человека, который так или иначе не сталкивался с психологией на практике.<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Собеседования при поступлении на работу, тестирование в школах, беседы с будущими родителями...в каждой сфере жизни присутствует психология. А знание ее законов помогает существенно облегчить проживание сложных жизненных ситуаций, кризисов, конфликтов.</p>

                    <p>Разумеется, в ряде случаев огромную пользу приносит индивидуальное общение с психологом - консультация. Однако, и книги, статьи, общение на важные для человечества темы уже снижают уровень тревоги, помогают сориентироваться, способствуют пониманию ситуации.</p>

                    <p>Я предлагаю вам вместе пройти этот путь психологического просвещения.<br />
                        Поговорить о семье и ее основных этапах развития, о детской психологии, о том, как справляться с кризисами. Информация будет представлена в виде публикаций.<br />
                        А если вам необходимы подробности, то со мной всегда можно связаться. В ближайшее время планирую рассказать о том, с чего начинается Семья, что важно знать при создании семьи, о чем договариваться с партнером сразу.</p>

                    </p>

                    <?php if($messages != null) :?>
                        <div class="single-blog-post single-page-content anim-5-all">
                            <?php foreach ($messages as $message):?>
                                <div class="post-meta" >
                                    <div class="date-holder" id="<?=$message['name'].$message['id']?>">
                                        <span><?php echo date('d', strtotime($message['date']));?></span>
                                        <?php
                                        $months = array( 1 => 'Янв' , 'Фев' , 'Мар' , 'Апр' , 'Май' , 'Июн' , 'Июл' , 'Авг' , 'Сен' , 'Окт' , 'Ноя' , 'Дек' );
                                        echo $months[date('n', strtotime($message['date']))];
                                        ?>
                                    </div>
                                    <div class="title-holder">
                                        <h2 class="title">Вопрос</h2>

                                    </div>
                                </div>
                                <div class="content">
                                    <div class="quote-box dt">
                                        <i class="fa fa-quote-left dtc"></i>
                                        <div class="quote-content dtc">
                                            <p style="margin-bottom: 3px;"><?=$message['query']?></p>
                                            <span class="name">- <?=$message['name']?></span>
                                        </div>
                                    </div>
                                    <br><br>
                                    <i>Ответ специалиста:</i><br>

                                    <?php foreach ($message['answer'] as $item):?>
                                        <p><?=$item['answer']?></p>
                                    <?php endforeach;?>
                                </div>
                            <?php endforeach;?>
                        </div><!-- /.single-blog-post -->
                    <?php endif;?>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pdr5"> <!--for this page-(Right Side) -->
                    <br>
                    Здравствуйте!
                    Меня зовут <h4>Эвридика Александровна Еремина.</h4>
                    <?=Html::img('/images/psycholog.jpg',['width'=>'45%']);?>
                    <p>
                        Более 10 лет я являюсь
                        практикующим психологом в области детской и семейной, кризисной психологии.
                        <br>


                        <a href="#actionDesc" class="" data-toggle="modal">
                            Подробнее <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </p>

                    <div class="modal fade" id="actionDesc" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel"> <img src="/images/psycholog.jpg" width="150"/>
                                        <br>Эвридика Александровна Еремина.</h4>

                                </div>
                                <div class="modal-body">

                                    Более 10 лет я являюсь
                                    практикующим психологом в области детской и семейной, кризисной психологии.
                                    Являясь выпускницей КубГУ, совершенствую свои профессиональные умения и
                                    навыки, посещаю семинары, мастер-классы коллег, изучаю новые тенденции
                                    современной психологии.<br>
                                    Здесь буду представлять статьи на темы, входящие в зону моей компетенции.<br>
                                    В жизни - жена и мама троих детей, разумеется, опираюсь и на свой жизненный опыт,
                                    который не отделим от профессионального.<br><br>

                                    В сложной жизненной ситуации вы можете обратиться ко мне за личной или семейной
                                    консультацией, также в некоторых случаях осуществляю патронаж.<br><br>
                                    Вы можете связаться со мной в режиме what's app по номеру<br>
                                    телефона<br><u> +7-918-380-7565</u> <br>или при помощи сообщения на электронную почту<br>
                                    <u>evri.dika@mail.ru</u><br>
                                    Так же вы можете задать вопрос нажав кнопку внизу страницы.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <br>
                    <?php if($messages != null) :?>
                        <h4>Список ответов на вопросы</h4>

                        <ul class="p0 category_item">

                            <?php foreach ($messages as $message):?>
                                <li><a href="#<?=$message['name'].$message['id']?>"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                        Ответ для <?=$message['name']?> от <?=date('d.m', strtotime($message['date']))?>
                                    </a></li>

                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>

                </div> <!-- End left side -->
            </div>
        </div>
    </section>
    <!-- ================== /start ========== -->


<?php endif;?>






