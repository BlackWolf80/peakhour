<?php
\app\assets\NormalAsset::register($this);
use app\components\BannerViewerWidget;
use yii\widgets\LinkPager;
?>
<div id="start"></div>
<!-- ================== Blog Container ========== -->
<section class="blog-container two-side-background single-blog-page faqs_sec"> <!-- faqs_sec use for style right side content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 white-left left-content ptb-80">
                <!-- .single-blog-post -->

                <div class="banner-block">
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?>
                    <?=BannerViewerWidget::widget(['group'=>0,'width'=>200])?>
                </div>
                <?php if (isset($_GET['vc'])):?>
                <div class="vacantion">

                    <table>
                        <tr>
                            <td class="container" colspan="3">
                                <h3> <?=$vacansion['vac_name'];?></h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="container" colspan="2">


                                    <?php if($vacansion['price'] != null):?>
                                    <h4>
                                        <?=number_format( $vacansion['price'], 0, ',', ' ' );?>

                                        ₽</h4>
                                    <?php else: ?>
                                        <h4> Заработная плата договорная </h4>
                                <?php endif;?>

                            </td>
                            <td><a class="fa fa-arrow-circle-left button_v" href="" onclick="javascript:history.back(); return false;"> Назад</a></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="vacant"></div>
                            </td>
                        </tr>
                        <tr><td>
                                № <?=$vacansion['id'];?>
                            </td>
                            <td><?=$vacansion['organization']?></td>
                            <td><?=$vacansion['date']?></td>
                        </tr>
                        <tr>
                            <td><?=$vacansion['contact_name'];?></td>
                            <td><?=$vacansion['phone'];?></td>
                            <td><?=$vacansion['email'];?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="vacant"></div>
                            </td>
                        </tr>
                        <?php if($vacansion['address'] != null):?>
                            <tr>
                                <td>адрес:</td>
                                <td colspan="2">
                                    <?=$vacansion['address'];?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="vacant"></div>
                                </td>
                            </tr>
                        <?php endif;?>
                        <?php if($vacansion['description'] != null):?>
                            <tr>
                                <td >
                                    <h4>Описание:</h4>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <?=$vacansion['description'];?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td></td>
                            </tr>
                        <?php endif;?>
                    </table>

                </div>

                <?php else: ?>


                    <div class="premium_block">

                        <?php foreach ($premium as $items):?>
                            <div class="vacantion">
                                <div class="col-lg-12">
                                <a href="/vacancy?vc=<?=$items['id']?>"><h3><?=$items['vac_name']?></h3></a>
                                <p>
                                    <?php if($items['price'] != null){echo '<h4>'.
                                        number_format( $items['price'], 0, ',', ' ' ).
                                        ' ₽</h4>';}?>
                                </p>
                                <p> <?=$items['organization']?></p>
                                <i><?=$items['date'].' | '.$items['address']?></i>
                                <span class="right"><a class="button_e read-more" href="/vacancy?vc=<?=$items['id']?>'">
                                            Подробнее <i class="fa fa-angle-right"></i></a></span>
                            </div></div>
                            <div class="clearfix"></div>
                        <?php endforeach;?>
                    </div>

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
                            <div class="banner-block">
                                <?=BannerViewerWidget::widget(['group'=>0,'width'=>610,'height'=>70,'class'=>'image_vid_min'])?><br>
                            </div>
                        </div>
                    </div>
                </div><!-- /.single-blog-post -->
                <?php endif;?>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 pull-left left_side pdr5"> <!--for this page-(Right Side) -->
                <div id="aside11">


                    <h4>
                        <span class="right"><a class="button_v" href="/vacancy/payment">Разместить вакансию </a></span>
                    </h4>

                    <h4>Группы вакансий</h4>

                    <div id="firstpane" class="menu_list">
                        <?=\app\components\AdsGroupWidget::widget(['model'=>'\VacantionGroup']);?>
                    </div>

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
                    </div>
                </div>
            </div> <!-- End left side -->

        </div>
    </div>
</section>
<!-- ================== /Blog Container ========== -->