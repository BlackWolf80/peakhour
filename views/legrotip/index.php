<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
\app\assets\NormalAsset::register($this);
?>

<!-- =============== blog container ============== -->
<article class="blog-container faqs_sec"> <!-- faqs_sec use for style side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right white-right right-side ptb-13">
                <?php if(isset($_GET['vc'])):?>

                    <div class="single-blog-post single-page-content anim-5-all">
                        <div class="company-tab">
                            <div class="tab-content">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                                    <?php echo LinkPager::widget(['pagination' => $pages ]);?>
                                </div>
                                <div class="clearfix"></div>
                                <?php foreach ($vacansions as $vacansion):?>
                                    <div class="vacantion">
                                        <a href="/vacancy?vc==<?=$vacansion['id']?>"><h3><?=$vacansion['vac_name']?></h3></a>
                                        <p>
                                            <?php if($vacansion['price'] != null){echo '<h4>'.
                                                number_format( $vacansion['price'], 0, ',', ' ' ).
                                                ' ₽</h4>';}?>
                                        </p>
                                        <p> <?=$vacansion['organization']?></p>
                                        <i><?=$vacansion['date'].' | '.$vacansion['address']?></i>
                                        <span class="right"><a class=" read-more" href="/vacancy?vc=<?=$vacansion['id']?>'">
                                            Подробнее <i class="fa fa-angle-right"></i></a></span>
                                    </div>
                                    <div class="clearfix"></div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div><!-- /.single-blog-post -->
                <?php elseif(isset($_GET['price'])):?>
                <div class="col-lg-8 col-md-8 grid_col">
                    <?php
                    switch ($_GET['price']){
                        case 1:
                            $columns = [
                                'id',
                                'name',
                                'density',
                                'price_t',
                                'price_l',
                            ];
                            break;
                        case 2:
                            $columns = [
                                'id',
                                'name',
                                'tara',
                                'packing',
                                'price_sht',
                                'price_kg',
                            ];
                            break;
                    }

                    echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => $columns,
                            ]);
                    ?>
            </div>
                <?php elseif(isset($_GET['public']) && $_GET['public'] == 80):?>

                    <!-- .single-blog-post -->
                    <div class="single-blog-post anim-5-all">

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
                    </div>


                <?php else:?>
                <div><img src="/images/3c304f-1.jpg" style="width:100%;"/></div><br clear="all"/><a name="caption1"></a>

                <h1><span class="font3" style="font-variant:small-caps;">ООО «ЛЕГРОТИП-Ресурс» осуществляет оптовую и

                    <span class="font1">РОЗНИЧНУЮ ПРОДАЖУ, А ТАКЖЕ ПОСТАВКУ ДИЗЕЛЬНОГО ТОПЛИВА,
                        БЕНЗИНА, МАСЕЛ, БИТУМА, ДТф И МАЗУТА ОТ ВЕДУЩИХ ЗАВОДОВ - ИЗГОТОВИТЕЛЕЙ НА ТЕРРИТОРИИ
                        РОССИЙСКОЙ ФЕДЕРАЦИИ.</span></h1>
                <p>
                    <span class="font1">Наша компания предлагает следующую продукцию ГСМ:</span></p>
                <table border="1"class="com_pr" >
                    <tr>
                        <th>
                            <p><span class="font1">Наименование</span></p></th>
                        <th>
                            <p><span class="font1">Плотность</span></p></th>
                        <th>
                            <p><span class="font1">Стоимость тонны</span></p></th>
                        <th>
                            <p><span class="font1">Стоимость литра</span></p></th>
                    </tr>


                   <?php foreach ($data as $item):?>

                       <tr>
                           <td>
                               <p><span class="font3">- <?=$item['name']?></span></p></td><td>
                               <p><span class="font3"><?=$item['density']?></span></p></td><td>
                               <p><span class="font3"><?=  number_format( $item['price_t'], 0, ',', ' ' )?></span></p></td><td>
                               <p><span class="font3"><?=$item['price_l']?></span></p></td>
                       </tr>

                   <?php endforeach;?>


                </table>
                <p><span class="font3">Одним </span><span class="font2">из </span><span class="font3">основных </span><span class="font2" style="font-variant:small-caps;">преимуществ сотрудничества </span><span class="font3">с </span><span class="font2" style="font-variant:small-caps;">«ЛЕГРОТИП-Ресурс» является собственный автопарк бензовозов различной калибровки.</span></p>
                <p><span class="font1" style="font-variant:small-caps;">Обратите внимание! при мелкооптовом и оптовом заказе стоимость</span></p>
                <p><span class="font1">ПРОСЧИТЫВАЕТСЯ В ИНДИВИДУАЛЬНОМ ПОРЯДКЕ. ВОЗМОЖЕН САМОВЫВОЗ, ДОСТАВКА </span><span class="font3">ж/д </span><span class="font1">ТРАНСПОРТОМ.</span></p>


                ﻿<table class="com_pr" border="0">
                    <tr><td>
                            <span class="font1" style="font-variant:small-caps;">По интересующим Вас вопросам<br />
                                ОБРАЩАЙТЕСЬ К МЕНЕДЖЕРАМ.</span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            <span class="font1" style="font-variant:small-caps;">Представитель в г. Краснодар:</span><br />
                            <span class="font1" style="font-variant:small-caps;">Телефон </span><span class="font4">8 - 928 - 40 - 155 - 83</span><br />
                            <span class="font1" style="font-variant:small-caps;">Whats арр </span>
                            <span class="font4">8 - 938 - 538 - 39 - 29</span>
                        </td>
                    </tr>
                </table>
                <?php endif;?>

            </div> <!-- End right-side -->
            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pbt-86"> <!-- Left Side -->
                <h4><?= Html::encode($this->title) ?></h4>
                <ul class="p0 category_item">
                    <li><?=Html::a('<i class="fa fa-angle-right"></i>&nbsp;Коммерческое предложение',Url::to(['/legrotip']));?></li>
                    <li><?=Html::a('<i class="fa fa-angle-right"></i>&nbsp;О компании (интервью)',Url::to(['/legrotip','public'=>80]));?></li>
                    <li><?=Html::a('<i class="fa fa-angle-right"></i>&nbsp;Прайс Legrotip Топливо',Url::to(['/legrotip','price'=>1]));?></li>
                    <li><?=Html::a('<i class="fa fa-angle-right"></i>&nbsp;Прайс Legrotip НЗСМ',Url::to(['/legrotip','price'=>2]));?></li>
                    <li><?=Html::a('<i class="fa fa-angle-right"></i>&nbsp;Вакансии Legrotip',Url::to(['/legrotip','vc'=>1]));?></li>

                    <?php if (isset($publication)){\app\components\PublicWidget::widget (['array' => $publication]);}?>


                </ul>
                <!-- End left side -->
            </div> <!-- End row -->
        </div>
</article>

<!-- =============== /blog container ============== -->

