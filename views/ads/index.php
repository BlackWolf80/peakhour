<?php
\app\assets\NormalAsset::register($this);
use app\components\BannerViewerWidget;
use yii\widgets\LinkPager;
use app\controllers\AdsController;
use yii\helpers\Html;
use yii\helpers\Url;
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


                    <?php if ( $ads != null) :?>
                    <div class="vacantion">

                        <table>
                            <tr>
                                <td class="container" colspan="3">
                                    <h3> <?=$ads['title'];?></h3>
                                </td>
                            </tr>



                            <tr><td colspan="2">
                                    <div class="imgGallery">

                                    <?php foreach ($ads->images as $image):?>

                                        <a href="/images/upload/store/<?=$image['filePath']?>" class="flipLightBox">
                                            <img class="img-hold" src="/images/upload/store/<?=$image['filePath']?>" alt="<?=$image['filePath']?>" height=50% />
                                            <span data-href="06-create-groups-demo.html" data-target="_blank"></span>
                                        </a>

                                    <?php endforeach;?>
                                    </div>

                                </td></tr>
                            <tr>
                                <td class="container" colspan="2">


                                    <?php if($ads['price'] != null):?>
                                        <h4>
                                            <?=number_format( $ads['price'], 0, ',', ' ' );?>

                                            ₽</h4>

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
                                    № <?=$ads['id'];?>
                                </td>
                                <td><?=$ads['organization']?></td>
                                <td><?=$ads['date']?></td>
                            </tr>
                            <tr>
                                <td><?=$ads['contact_name'];?></td>
                                <td><?=$ads['phone'];?></td>
                                <td><?=$ads['email'];?></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="vacant"></div>
                                </td>
                            </tr>
                            <?php if($ads['address'] != null):?>
                                <tr>
                                    <td>адрес:</td>
                                    <td colspan="2">
                                        <?=$ads['address'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="vacant"></div>
                                    </td>
                                </tr>
                            <?php endif;?>
                                <tr>
                                    <td >
                                        <h4>Описание:</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <?=$ads['body'];?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td></td>
                                </tr>
                        </table>

                    </div>
                    <?php else:?>

                    <br /><br /><br /><br />   <h2> Нет такого объявления.</h2>
                    <?php endif;?>
                <?php else: ?>



<!--                    --------------------------------------------->




                    <div class="premium_block">
                        <?php foreach ($premium as $items):?>
                        <?php if( app\controllers\AdsController::setTimeFlag($items) == 1):?>


                            <div class="vacantion">
                                <div class="col-lg-12">
                                    <a href="/adc?vc=<?=$items['id']?>"><h3><?=$items['title']?></h3></a>

                                    <p class="ads">
                                        <?php  foreach ($items['images'] as $image){
                                            if ($image['isMain'] == 1){echo '<img src="/images/upload/store/'.$image['filePath']. '" />';}
                                        }
                                        ?>
                                    </p>
                                    <p>
                                        <?php if($items['price'] != null){echo '<h4>'.
                                            number_format( $items['price'], 0, ',', ' ' ).
                                            ' ₽</h4>';}?>
                                    </p>

                                    <i><?=$items['date'].' | '.$items['organization']?></i>
                                    <span class="right"><a class="button_e read-more" href="/ads?vc=<?=$items['id']?>'">
                                            Подробнее <i class="fa fa-angle-right"></i></a></span>
                                </div></div>
                            <div class="clearfix"></div>
                        <?php endif;?>
                        <?php endforeach;?>
                    </div>

                    <div class="single-blog-post single-page-content anim-5-all">
                        <div class="company-tab">
                            <div class="tab-content">
                                <h2> <?php
                                    if(isset($_GET['group'])){
                                        if(isset($ads[0]['group0']['name'])){echo $ads[0]['group0']['name'];}
                                    }
                                        ;?>
                                </h2>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                                    <?php echo LinkPager::widget(['pagination' => $pages ]);?>
                                </div>
                                <div class="clearfix"></div>

                                <?php foreach ($ads as $adss):?>
                                    <?php if( app\controllers\AdsController::setTimeFlag($adss) == 1):?>
                                    <div class="vacantion">
                                        <a href="/ads?vc=<?=$adss['id']?>"><h3><?=$adss['title']?></h3></a>
                                        <p class="ads">
                                            <?php  foreach ($adss['images'] as $image){
                                                if ($image['isMain'] == 1){echo '<img src="/images/upload/store/'.$image['filePath']. '" />';}
                                            }
                                            ?>
                                        </p>
                                        <p>
                                            <?php if($adss['price'] != null){echo '<h4>'.
                                                number_format( $adss['price'], 0, ',', ' ' ).
                                                ' ₽</h4>';}?>
                                        </p>
                                        <i><?=$adss['date'].' | '.$adss['organization']?></i>
                                        <span class="right"><a class=" read-more" href="/ads?vc=<?=$adss['id']?>'">
                                            Подробнее <i class="fa fa-angle-right"></i></a></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php endif;?>
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
                        <span class="right"><a class="button_v" href="/ads/post">Разместить объявление </a></span>
                    </h4>

                    <h4>Категории</h4>

                    <div id="firstpane" class="menu_list">
                        <?=\app\components\AdsGroupWidget::widget(['model'=>'\AdsGroup','tpl'=>'ads']);?>
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