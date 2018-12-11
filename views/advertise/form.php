<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;


?>
<!-- =================== Contact us container ============== -->


<div class="container">




</div>

<section class="contact_us_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"> <!-- section title -->
                <h2>Обратная связь</h2>
            </div> <!-- End section title -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form_holder"> <!-- form holder -->

                <?php if (isset($_GET['list'])){}?>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right address">
                <address>
                    <div class="icon_holder float_left"><span class="icon icon-Pointer"></span></div>
                    <div class="address_holder float_left">Тут вы можете задать вопрос <br>по любой интересующей вас теме,
                        относительно нашего портала.<br>
                    Мы ответим вам в ближайшее время</div>
                </address>
                <address class="clear_fix">
                    <div class="icon_holder float_left"><span class="icon icon-Plaine"></span></div>
                    <div class="address_holder float_left">Можно так же написать письмо на адрес: <br>info@peakhouse.ru</div>
                </address>
                <address class="clear_fix">
                    <div class="icon_holder float_left"><span class="icon icon-Phone2"></span></div>
                    <div class="address_holder float_left">+ (1800) 456 7890 <br> + (1544) 456 7890</div>
                </address>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"><br></div>
<!-- =================== /Contact us container ============== -->


