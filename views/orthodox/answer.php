<?php
\app\assets\NormalAsset::register($this);
?>

<div id="start"></div>
<!-- ================== Blog Container ========== -->
<section class="blog-container two-side-background single-blog-page faqs_sec"> <!-- faqs_sec use for style right side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 white-left left-content ptb-80">
                <!-- .single-blog-post -->


                <div class="single-blog-post single-page-content anim-5-all">
                    <div class="img-holder"><img  src="/images/komu-verit_1.jpg" alt=""></div>
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
                                <p ><h4><?=$message['title']?></h4></p>

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
                            <i>Ответ:</i><br>
                            <?php foreach ($message['answer'] as $item):?>
                                <p><?php
                                    if(isset($_GET['id'])){
                                        echo $item['answer'].'<p><a class="fa fa-arrow-circle-left read-more" href="" onclick="javascript:history.back(); return false;"> Назад</a></p>';}
                                        else{
                                        echo mb_substr($item['answer'], 0, 450). '...  <br><i><a class=" read-more" href="/orthodox/answer?id='.$message['id'].'">Подробнее <i class="fa fa-angle-right"></i></a></i>';
                                    }
                                    ?>
                                    </p>
                            <?php endforeach;?>
                        </div>
                    <?php endforeach;?>
                </div><!-- /.single-blog-post -->

            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pdr5"> <!--for this page-(Right Side) -->
                <div id="aside11">
                <h4>Ответы на вопросы</h4>

                <ul class="p0 category_item">
                    <?php foreach ($messages as $message):?>
                        <li><a href="#<?=$message['name'].$message['id']?>"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?=$message['title'];?>
                            </a></li>

                    <?php endforeach;?>
                </ul>
            </div><?=\app\components\RandomSliderWidget::widget(['group'=>2]);?>
            </div> <!-- End left side -->

        </div>
    </div>
</section>
<!-- ================== /Blog Container ========== -->