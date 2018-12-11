<?php
use yii\helpers\Html;
\app\assets\NormalAsset::register($this);
?>
<!-- ======= revolution slider section ======= -->
<?=\app\components\SliderWidget::widget(['select'=>1]);?>
<!-- ======= /revolution slider section ======= -->

<!-- ======= Who We Are ======= -->
<section class="we_are">
    <div class="left_side float_left">
        <div class="we_are_opacity">
            <div class="we_are_border">
                <h2>Все обо всем</h2>
            </div>
        </div>
    </div> <!-- End Left_Side -->
    <div class="right_side float_right">
        <div class="we_are_deatails">
            <h2>Что такое Час–Пик?</h2>



            <p>

            &nbsp;&nbsp;&nbsp;&nbsp; Мы - портал, посвященный самым главным аспектам жизни любого человека.<br />

            &nbsp;&nbsp;&nbsp;&nbsp; Основную тематику нашего сайта наилучшим образом характеризует стихотворение В.В. Маяковского &laquo;
                <a href="#actionStih" class="" data-toggle="modal">
                    <i>Что такое хорошо и что такое плохо?</i></a>
                &raquo;.<br />

            &nbsp;&nbsp;&nbsp;&nbsp;Вопросы, поднятые в этом стихотворении, относится не только к детям, но и к их родителям, ведь сейчас даже многие состоявшиеся взрослые люди стали забывать простые правила счастливой жизни.<br />

            &nbsp;&nbsp;&nbsp;&nbsp;Раз в месяц мы выпускаем печатную версию нашего сайта и бесплатно раздаем ее на улицах г.Краснодара; в ближайшем будущем планируется расширение в рамках Краснодарского края.<br />

            &nbsp;&nbsp;&nbsp;&nbsp;Читайте и пишите нам, задавайте свои вопросы - мы готовы ответить ВСЕМ!<br />

            &nbsp;&nbsp;&nbsp;&nbsp;Портал охватывает широкий круг областей из жизни города и края, и для Вашей истории всегда айдется нужная рубрика.<br />

            &nbsp;&nbsp;&nbsp;&nbsp;Делитесь своими примерами, рецептами - лучшие из них мы обязательно опубликуем.<br />

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Коллектив Час-Пик желает Вам удачного дня!</b>


            </p>


            <div class="modal fade" id="actionStih" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">
                                В. Маяковский<br>&laquo;Что такое хорошо и что такое плохо?&raquo;</h4>

                        </div>
                        <div class="modal-body">

                            <p>Крошка сын&nbsp;к отцу пришел,<br />
                                и спросила кроха:<br />
                                &mdash; Что такое&nbsp;<em>хорошо&nbsp;</em>и что такое&nbsp;<em>плохо?</em><br />
                                У меня&nbsp;секретов нет,&nbsp;&mdash;<br />
                                слушайте, детишки,&nbsp;&mdash;<br />
                                папы этого&nbsp;ответ<br />
                                помещаю&nbsp;в книжке.</p>

                            <p>&mdash; Если ветер&nbsp;крыши рвет,<br />
                                если&nbsp;град загрохал,&nbsp;&mdash;<br />
                                каждый знает&nbsp;&mdash; это вот<br />
                                для прогулок&nbsp;плохо.<br />
                                Дождь покапал&nbsp;и прошел.<br />
                                Солнце&nbsp;в целом свете.<br />
                                Это -&nbsp;очень хорошо<br />
                                и большим&nbsp;и детям.</p>

                            <p>Если&nbsp;сын&nbsp; чернее ночи,<br />
                                грязь лежит&nbsp;на рожице,&nbsp;&mdash;<br />
                                ясно,&nbsp;это&nbsp;плохо очень<br />
                                для ребячьей кожицы.</p>

                            <p>Если&nbsp;мальчик&nbsp;любит мыло<br />
                                и зубной порошок,<br />
                                этот мальчик&nbsp;очень милый,<br />
                                поступает хорошо.</p>

                            <p>Если бьет&nbsp; дрянной драчун<br />
                                слабого мальчишку,<br />
                                я такого&nbsp; не хочу<br />
                                даже&nbsp;вставить в книжку.</p>

                            <p>Этот вот кричит:&nbsp;- Не трожь<br />
                                тех,&nbsp;кто меньше ростом!&nbsp;&mdash;<br />
                                Этот мальчик&nbsp;так хорош,<br />
                                загляденье просто!<br />
                                Если ты&nbsp;порвал подряд<br />
                                книжицу&nbsp; и мячик,<br />
                                октябрята говорят:<br />
                                плоховатый мальчик.</p>

                            <p>Если мальчик&nbsp;любит труд,<br />
                                тычет&nbsp;в книжку&nbsp;пальчик,<br />
                                про такого&nbsp; пишут тут:<br />
                                он&nbsp;хороший мальчик.</p>

                            <p>От вороны&nbsp; карапуз<br />
                                убежал, заохав.<br />
                                Мальчик этот&nbsp; просто трус.<br />
                                Это&nbsp; очень плохо.</p>

                            <p>Этот,&nbsp; хоть и сам с вершок,<br />
                                спорит&nbsp;с грозной птицей.<br />
                                Храбрый мальчик,&nbsp;хорошо,<br />
                                в жизни&nbsp;пригодится.<br />
                                Этот&nbsp; в грязь полез&nbsp;и рад.<br />
                                что грязна рубаха.<br />
                                Про такого&nbsp; говорят:<br />
                                он плохой,&nbsp;неряха.<br />
                                Этот&nbsp;чистит валенки,<br />
                                моет&nbsp;сам&nbsp;галоши.<br />
                                Он&nbsp;хотя и маленький,<br />
                                но вполне хороший.</p>

                            <p>Помни&nbsp;это&nbsp; каждый сын.<br />
                                Знай&nbsp;любой ребенок:<br />
                                вырастет&nbsp;из сына&nbsp;cвин,<br />
                                если сын -&nbsp; свиненок,<br />
                                Мальчик&nbsp; радостный пошел,<br />
                                и решила кроха:<br />
                                &laquo;Буду&nbsp;делать<em>хорошо,</em><br />
                                и не буду -&nbsp;<em>плохо&raquo;.</em></p>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div> <!-- End right_side -->
</section> <!-- End We Are -->
<!-- ======= /Who We Are ======= -->


<!-- ======== Latest News ======== -->
<section class="p0 container-fluid latest_news_sec news_large">
    <div class="container">
        <h2><?=Html::a('Новости ',['/news','id'=>2100])?></h2>
    </div>

    <?php foreach ($news as $new):?>
        <div class="col-lg-3 col-md-6 news ">
            <div class="news_img_holder">
                <img class="img-responsive" src="<?=$new['image']?>" alt="image">
                <div class="news_opacity">
                </div>
                <div class="news_details">
                    <a href="/site/public?id=<?=$new['id']?>">
                        <span><?php echo date('d.m.Y', strtotime($new['date']));?></span>
                        <h4><?=$new['title']?></h4>
                        <p><?=$new['spoiler']?></p>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
</section> <!-- End latest_news_sec -->
<!-- ======== /Latest News ======== -->


<!-- ======= Welcome section ======= -->
<section class="welcome_sec">
    <div class="container">
        <div class="row welcome_heading">
            <div class="mar">
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <h2>Мы предлагаем <br>услуги</h2>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                <p>
                    <ul>
                        <li>Размещение рекламы</li>
                        <li>Бесплатное размещение вакансий от прямых работодателей</li>
                    </ul>

                </p>
            </div></div>
        </div> <!-- End Row -->

        <div class="row welcome welcome_details">

            <div class="col-lg-6 col-md-12">
                <div class="welcome_item">
                    <img src="/images/kl_300x200.jpg" alt="/images">
                    <div class="welcome_info">
                        <h3>Можно ли сотрудничать с Час Пик?</h3>
                        <p><strong>Можно и нужно!</strong> Присылайте вопросы и предложения, свои истории, рецепты, все- что касается наших тем! Лучшее опубликуем!</p>
                    </div>
                </div>
                <div class="welcome_item welcome_item_bottom">
                    <img src="/images/eedb440a6f27ccb4205b7c0829cb5485.jpg" alt="/images">
                    <div class="welcome_info">
                        <h3>Есть ли у вас вакансии?</h3>
                        <p><strong>Да. Есть.</strong> Пришлите резюме на наш электронный ящик, рассмотрим и предложим.<br />
                            <span style="font-family:comic sans ms,cursive"><em>(Любой работодатель может совершенно бесплатно разместить вакансию на нашем портале)</em></span>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 bottom_row">
                <div class="welcome_item">
                    <img src="/images/H_CKtnnvwBM.jpg" alt="/images">
                    <div class="welcome_info">
                        <h3>Можно ли разместить свою рекламу на вашем портале?</h3>
                        <p><strong>Да. Можно.</strong> Присылайте письма на наш электронный ящик или звоните. Дорого не возьмем и разместим в печатной версии Час Пик.</p>
                    </div>
                </div>
                <div class="welcome_item welcome_item_bottom">
                    <img src="/images/1519595615_Kak-ponyat-chto-pora-k-psihologu_2.jpg" alt="/images">
                    <div class="welcome_info">
                        <h3>Наш психолог даст вам совет</h3>
                        <p>
                            В современном мире сложно представить себе человека,
                            который так или иначе не сталкивался с психологией на практике.<br />
                            Собеседования при поступлении на работу, тестирование в школах,
                            беседы с будущими родителями...

                        </p>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->
    </div> <!-- End container -->
</section> <!-- End welcome_sec -->
<!-- ======= /Welcome section ======= -->

<section class="latest_work">
    <div class="work_gallery">
        <?=\app\components\PublicViewerWidget::widget(['id'=>91,'fl'=>2]);?>
    </div>
</section>




