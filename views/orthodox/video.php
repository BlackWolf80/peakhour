<?php
\app\assets\NormalAsset::register($this);
?>
<!-- ======= Banner ======= -->
<section class="p0 container-fluid banner about_banner">
    <div class="about_banner_opacity">
        <div class="container">
            <div class="banner_info_about">
                <h1>Рекомендуемое видео</h1>

            </div> <!-- End Banner Info -->
        </div> <!-- End Container -->
    </div> <!-- End Banner_opacity -->
</section> <!-- End Banner -->
<!-- ======= /Banner ======= -->
<section class="side_tab">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left left_side_bar"> <!-- required for floating -->
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left"><!-- 'tabs-right' for right tabs -->
                    <li class="active"><a href="#prop" data-toggle="tab"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;Проповеди</a></li>
                    <li><a href="#choral_singing" data-toggle="tab"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;Хоровое пение</a></li>
                    <li><a href="#movie" data-toggle="tab"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;Кино</a></li>
                    <li><a href="#cartoon" data-toggle="tab"><i class="fa fa-angle-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;Мультфильмы</a></li>

                </ul>
            </div>
            <div class="white_bg right_side col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                <div class="tab_details">
                    <!-- Tab panes -->

                    <div class="tab-content right_info">
                        <div class="tab-pane fade in row active" id="prop">
                            <?=\app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>7]);?>
                        </div>
                        <div class="tab-pane fade in row" id="cartoon">
                            <?=\app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>1]);?>
                        </div>

                        <div class="tab-pane fade row" id="choral_singing">
                            <?=\app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>2]);?>
                        </div>

                        <div class="tab-pane fade row" id="movie">
                            <?=\app\components\VideoWidget::widget(['imgFlag'=>1,'group'=>3]);?>
                        </div>
                    </div>
                </div> <!-- End tab_details -->


                <div class="clear_fix"></div>

            </div> <!-- End white_bg -->

        </div> <!-- End row -->
    </div> <!-- End container -->
</section>
